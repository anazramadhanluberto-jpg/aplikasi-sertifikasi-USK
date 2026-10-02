<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;

class DashboardController extends Controller
{
    public function index() {
        $totalPeserta = Peserta::count();
        $totalSkema = Skema::count();

        $pesertas = Peserta::with('skema')->oldest()->get();

        return view('dashboard', compact('totalPeserta', 'totalSkema', 'pesertas'));
    }
}
