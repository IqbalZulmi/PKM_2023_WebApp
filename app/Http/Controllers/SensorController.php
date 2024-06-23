<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    public function store (Request $request){
        try {
            $validate = Validator::make($request->all(), [
                'id_titik' => 'required',
                'turbidity' => 'required',
                'ph' => 'required',
                'temperature' => 'required',
            ],[
                'id_titik.required' => 'id_titik harus diisi.',
                'turbidity.required' => 'turbidity harus diisi.',
                'ph.required' => 'ph harus diisi.',
                'temperature.required' => 'temperature harus diisi.',
            ]);

            $sensor = new Sensor();
            $sensor->id_titik = $request->id_titik;
            $sensor->turbidity = $request->turbidity;
            $sensor->ph = $request->ph;
            $sensor->temperature = $request->temperature;
            $sensor->created_at = Carbon::now();

            $sensor->save();

            return response()->json([
                'notifikasi' => 'Data sensor berhasil disimpan',
                'type' => 'success'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'notifikasi' => 'Terjadi kesalahan saat menyimpan data',
                'type' => 'danger',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
