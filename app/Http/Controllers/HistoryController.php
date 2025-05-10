<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class HistoryController extends Controller
{
    public function showHistory()
    {
        // Ambil data statistik dari database
        $riwayat = Statistic::all();

        // Total penghematan
        $totalHemat = $riwayat->sum('total_food_saved');

        // Estimasi dampak lingkungan
        $dampakLingkungan = [
            'co2_saved' => round($totalHemat / 10000 * 1.5, 2), // contoh: 1.5 kg CO2 tiap Rp10rb
            'water_saved' => round($totalHemat / 10000 * 100, 2) // contoh: 100 liter air tiap Rp10rb
        ];

        // Kirim data ke view 'penerima.riwayat'
        return view('penerima.riwayat', compact('riwayat', 'totalHemat', 'dampakLingkungan'));
    }
}
