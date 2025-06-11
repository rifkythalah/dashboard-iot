<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rfid;

class RfidController extends Controller
{
    public function store(Request $request)
    {
        // Ambil data terakhir kartu ini
        $rfid = \App\Models\Rfid::where('id_rfid', $request->id_rfid)
            ->orderBy('activity_time', 'desc')->first();
    
        $activity = 'masuk';
        $status_rfid = 'aktif';
        $jumlah_rfid = 1;
    
        if ($rfid && $rfid->activity === 'masuk') {
            // Jika sudah masuk, tap berikutnya keluar
            $activity = 'keluar';
            $status_rfid = 'mati';
            $jumlah_rfid = 0;
        }
    
        $newRfid = \App\Models\Rfid::create([
            'id_rfid' => $request->id_rfid,
            'rfid' => $request->rfid,
            'status_rfid' => $status_rfid,
            'jumlah_rfid' => $jumlah_rfid,
            'activity' => $activity,
            'activity_time' => now(),
        ]);
    
        return response()->json(['success' => true, 'data' => $newRfid]);
    }
public function index()
{
    $rfids = \App\Models\Rfid::orderBy('activity_time', 'desc')->get();
    return response()->json(['success' => true, 'data' => $rfids]);
}
}