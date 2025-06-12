<?php

// app/Http/Controllers/ParkingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ParkingController extends Controller
{
     // API endpoint for ESP32
     public function updateSlot(Request $request)
     {
         Log::info('Received parking update request');
         // Ambil data dari JSON body
         $data = $request->json()->all();
         $slot1 = isset($data['slot1']) ? $data['slot1'] : false;
         $slot2 = isset($data['slot2']) ? $data['slot2'] : false;
     
         Log::info("Parking Data: Slot1=" . ($slot1 ? 'true' : 'false') . ", Slot2=" . ($slot2 ? 'true' : 'false'));
 
         $this->handleSlot('A', $slot1);
         $this->handleSlot('B', $slot2);
     
         return response()->json(['success' => true]);
     }
     
     private function handleSlot($slot, $occupied)
     {
         Log::info("Handling Slot {$slot}, Occupied: " . ($occupied ? 'true' : 'false'));
 
         $active = Parking::where('slot', $slot)->where('status', 'active')->first();
         
         if ($active) {
             Log::info("Slot {$slot}: Active record found. Status: {$active->status}");
         } else {
             Log::info("Slot {$slot}: No active record found.");
         }
 
         if ($occupied && !$active) {
             // Mobil masuk
             Parking::create([
                 'slot' => $slot,
                 'entry_time' => now(),
                 'status' => 'active',
                 'price' => 0
             ]);
             Log::info("Slot {$slot}: New entry recorded.");
         } elseif (!$occupied && $active) {
             // Mobil keluar
             $exit = now();
             $duration = Carbon::parse($active->entry_time)->diffInMinutes($exit);
             $price = intval(floor($duration / 2)) * 5000;
             $active->update([
                 'exit_time' => $exit,
                 'status' => 'done',
                 'price' => $price
             ]);
             Log::info("Slot {$slot}: Exit recorded. Duration: {$duration} mins, Price: {$price}");
         }
     }

    // For dashboard
    public function dashboard()
    {
        $slots = ['A', 'B'];
        $slotStatus = [];
        foreach ($slots as $slot) {
            $active = Parking::where('slot', $slot)->where('status', 'active')->first();
            $slotStatus[$slot] = $active ? 'occupied' : 'available';
        }

        $available = count(array_filter($slotStatus, fn($s) => $s == 'available'));
        $occupied = count(array_filter($slotStatus, fn($s) => $s == 'occupied'));
        $capacity = 2;
        $percent = intval(($available / $capacity) * 100);

        $recent = Parking::orderBy('entry_time', 'desc')->take(10)->get();

        return view('dashboard', compact('slotStatus', 'available', 'occupied', 'percent', 'recent'));
    }

}