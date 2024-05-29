<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Titik;
use Illuminate\Http\Request;

class LaporanSensor extends Controller
{
    public function showLaporanSensorPage(){
        $sensors = Sensor::latest()->get();
        $titik = Titik::all();
        return view("laporan-sensor",[
            "dataSensor"=> $sensors,
            "dataTitik"=> $titik
        ]);
    }
}
