<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rfid;
use App\Models\Flame;

class DashboardController extends Controller
{
    // Untuk halaman dashboard
    public function dashboard()
    {
        // Data dashboard
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

        return view('dashboard', compact(
            'activeCount', 'rfidSystemStatus', 'recentRfidLogs',
            'latestFlame', 'flameHistory'
        ));
    }

    // Untuk halaman beranda
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

        return view('beranda', compact(
            'activeCount', 'rfidSystemStatus', 'recentRfidLogs',
            'latestFlame', 'flameHistory'
        ));
    }
}