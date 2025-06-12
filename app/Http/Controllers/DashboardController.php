<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rfid;
use App\Models\Flame;
use App\Models\Parking; // Import Parking Model
use Carbon\Carbon; // Ensure Carbon is imported if used directly here, though Parking model already uses it.

class DashboardController extends Controller
{
    // Untuk halaman dashboard
    public function dashboard()
    {
        // --- Data RFID (Existing) ---
        $rfidCards = Rfid::select('id_rfid', \DB::raw('MAX(activity_time) as last_time'))
            ->groupBy('id_rfid')->get();
        $activeCount = 0;
        foreach ($rfidCards as $card) {
            $last = Rfid::where('id_rfid', $card->id_rfid)
                ->orderBy('activity_time', 'desc')->first();
            if ($last && $last->activity === 'masuk') {
                $activeCount++;
            }
        }
        $rfidSystemStatus = $activeCount > 0 ? 'Active' : 'Off';
        $recentRfidLogs = Rfid::orderBy('activity_time', 'desc')->take(10)->get();

        // --- Data Flame (Existing) ---
        $latestFlame = Flame::where('sensor_id', 'FS-001')->orderBy('last_update', 'desc')->first();
        $flameHistory = Flame::where('sensor_id', 'FS-001')->orderBy('last_update', 'desc')->take(10)->get();

        // --- Data Parking (New Addition, moved from ParkingController) ---
        $slots = ['A', 'B'];
        $parkingSlotStatus = []; // Renamed to avoid potential conflicts with other $slotStatus
        foreach ($slots as $slot) {
            $activeParking = Parking::where('slot', $slot)->where('status', 'active')->first();
            $parkingSlotStatus[$slot] = $activeParking ? 'occupied' : 'available';
        }

        $parkingAvailable = count(array_filter($parkingSlotStatus, fn($s) => $s == 'available'));
        $parkingOccupied = count(array_filter($parkingSlotStatus, fn($s) => $s == 'occupied'));
        $parkingCapacity = 2; // Assuming 2 total parking slots
        $parkingPercent = intval(($parkingAvailable / $parkingCapacity) * 100);

        $recentParkings = Parking::orderBy('entry_time', 'desc')->take(10)->get();

        // --- Pass all data to the view ---
        return view('dashboard', compact(
            'activeCount', 'rfidSystemStatus', 'recentRfidLogs',
            'latestFlame', 'flameHistory',
            'parkingSlotStatus', 'parkingAvailable', 'parkingOccupied', 'parkingPercent', 'recentParkings'
        ));
    }

    // Untuk halaman beranda (Existing)
    public function beranda()
    {
        // Data beranda (bisa sama atau berbeda dengan dashboard)
        $rfidCards = Rfid::select('id_rfid', \DB::raw('MAX(activity_time) as last_time'))
            ->groupBy('id_rfid')->get();
        $activeCount = 0;
        foreach ($rfidCards as $card) {
            $last = Rfid::where('id_rfid', $card->id_rfid)
                ->orderBy('activity_time', 'desc')->first();
            if ($last && $last->activity === 'masuk') {
                $activeCount++;
            }
        }
        $rfidSystemStatus = $activeCount > 0 ? 'Active' : 'Off';
        $recentRfidLogs = Rfid::orderBy('activity_time', 'desc')->take(10)->get();

        $latestFlame = Flame::where('sensor_id', 'FS-001')->orderBy('last_update', 'desc')->first();
        $flameHistory = Flame::where('sensor_id', 'FS-001')->orderBy('last_update', 'desc')->take(10)->get();

        $recentParkings = Parking::orderBy('entry_time', 'desc')->take(10)->get();

        // Parking data for beranda (similar to dashboard but adapted)
        $slots = ['A', 'B'];
        $parkingSlotStatus = [];
        foreach ($slots as $slot) {
            $activeParking = Parking::where('slot', $slot)->where('status', 'active')->first();
            $parkingSlotStatus[$slot] = $activeParking ? 'occupied' : 'available';
        }

        $parkingAvailable = count(array_filter($parkingSlotStatus, fn($s) => $s == 'available'));
        $parkingOccupied = count(array_filter($parkingSlotStatus, fn($s) => $s == 'occupied'));
        $parkingCapacity = 2; // Assuming 2 total parking slots
        $parkingPercent = intval(($parkingAvailable / $parkingCapacity) * 100);

        return view('beranda', compact(
            'activeCount', 'rfidSystemStatus', 'recentRfidLogs',
            'latestFlame', 'flameHistory', 'recentParkings',
            'parkingAvailable', 'parkingOccupied', 'parkingPercent', 'parkingSlotStatus'
        ));
    }
} 