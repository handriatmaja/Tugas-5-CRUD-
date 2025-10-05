<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua Dosen dan hitung relasi mataKuliahs
        // withCount('mataKuliahs') akan menambahkan kolom 'mata_kuliahs_count'
        $dosens = Dosen::withCount('mataKuliahs')
                        ->orderBy('mata_kuliahs_count', 'desc')
                        ->get();

        // Siapkan data untuk Chart.js (Labels dan Data Points)
        $labels = $dosens->pluck('nama')->toArray();
        $dataCounts = $dosens->pluck('mata_kuliahs_count')->toArray();

        // Data akan dikirim ke view dalam format JSON
        $chartData = [
            'labels' => $labels,
            'data' => $dataCounts
        ];

        return view('dashboard.index', compact('chartData'));
    }
}