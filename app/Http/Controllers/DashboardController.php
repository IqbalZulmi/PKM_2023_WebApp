<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Titik;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function showDashboardPage()
    {
        $titik = Titik::orderBy("created_at", "asc")->get();

        return view('dashboard',[
            'dataTitik'=> $titik,
        ]);
    }

    public function showDashboardDetailPage($id_titik)
    {
        // Mendapatkan data sensor terbaru hari ini
        $latestSensor = Sensor::where('id_titik', $id_titik)->latest()->first();

        // // Mendapatkan semua data sensor hari ini
        // $latestFourSensor = Sensor::where('id_titik', $id_titik)
        //     ->latest()
        //     ->take(4)
        //     ->get();

        return view('detail-dashboard', [
            'dataTerbaru' => $latestSensor,
            // 'empatDataTerbaru' => $latestFourSensor,
            'id_titik' => $id_titik,
        ]);
    }
}


