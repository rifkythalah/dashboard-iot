<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flame;

class FlameController extends Controller
{
    public function store(Request $request)
    {
        // Mapping nilai ke level dan status
        $indicator = intval($request->indicator);
        $level = 'Low';
        $status = 'Safe';
        if ($indicator >= 70) {
            $level = 'High';
            $status = 'Danger';
        } elseif ($indicator >= 50) {
            $level = 'Medium';
            $status = 'Warning';
        }

        $flame = Flame::create([
            'sensor_id' => $request->sensor_id ?? 'FS-001',
            'indicator' => $indicator,
            'level' => $level,
            'status' => $status,
            'last_update' => now(),
        ]);

        return response()->json(['success' => true, 'data' => $flame]);
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