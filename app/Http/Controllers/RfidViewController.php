<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rfid;

class RfidViewController extends Controller
{
    public function index()
{
    // Ambil status terakhir setiap kartu
    $rfidCards = \App\Models\Rfid::select('id_rfid', \DB::raw('MAX(activity_time) as last_time'))
        ->groupBy('id_rfid')->get();

    $activeCount = 0;

    foreach ($rfidCards as $card) {
        $last = \App\Models\Rfid::where('id_rfid', $card->id_rfid)
            ->orderBy('activity_time', 'desc')->first();

        if ($last && $last->activity === 'masuk') {
            $activeCount++;
        }
    }

    $rfidSystemStatus = $activeCount > 0 ? 'Active' : 'Off';
    $recentLogs = \App\Models\Rfid::orderBy('activity_time', 'desc')->take(10)->get();

    return view('beranda', compact('activeCount', 'rfidSystemStatus', 'recentLogs'));
}
}