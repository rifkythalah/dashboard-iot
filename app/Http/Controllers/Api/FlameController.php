<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flame;

class FlameController extends Controller
{
    // FlameController.php

public function store(Request $request)
{
    $sensor_id = $request->input('sensor_id');
    $indicator = $request->input('indicator');

    // Tentukan level & status
    if ($indicator >= 70) {
        $level = 'High';
        $status = 'Danger';
    } elseif ($indicator >= 50) {
        $level = 'Medium';
        $status = 'Warning';
    } else {
        $level = 'Low';
        $status = 'Safe';
    }

    // Ambil status terakhir dari sensor ini
    $last = Flame::where('sensor_id', $sensor_id)->orderBy('id', 'desc')->first();

    // Jika status sama, JANGAN simpan
    if ($last && $last->status == $status) {
        // Tetap balas status terakhir
        return response()->json([
            'success' => true,
            'message' => 'No status change, not saved.',
            'data' => $last
        ]);
    }

    // Jika status berubah, simpan ke database
    $flame = Flame::create([
        'sensor_id' => $sensor_id,
        'indicator' => $indicator,
        'level' => $level,
        'status' => $status,
        'last_update' => now()
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Status changed, saved.',
        'data' => $flame
    ]);
}

    public function latest()
    {
        // Ambil data terbaru sensor FS-001
        $flame = Flame::where('sensor_id', 'FS-001')->orderBy('last_update', 'desc')->first();
        return response()->json(['success' => true, 'data' => $flame]);
    }

    public function index()
    {
        // Untuk tabel history
        $flames = Flame::orderBy('last_update', 'desc')->take(10)->get();
        return response()->json(['success' => true, 'data' => $flames]);
    }
}