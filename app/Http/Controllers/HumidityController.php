<?php

namespace App\Http\Controllers;

use App\Models\humidity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HumidityController extends Controller
{
    public function getHumidity(){
        $humidity = humidity::latest()->first();

        return view('landing',[
            'dataHumidity' => $humidity,
        ]);
    }

    public function storeHumidity(Request $request) {
        $validator = Validator::make($request->all(), [
            'humidity' => 'required|numeric',
        ], [
            'humidity.required' => 'Humidity wajib diisi.',
            'humidity.numeric' => 'Humidity harus berupa angka.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'notifikasi' => 'Validasi gagal',
                'type' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Mencari entri terakhir di tabel humidities
            $lastEntry = Humidity::latest()->first();

            // Jika tidak ada entri, buat ID baru (misalnya, 1)
            $id = $lastEntry ? $lastEntry->id : 1;

            // Menggunakan updateOrCreate untuk menambah atau memperbarui data berdasarkan ID terakhir
            $humidity = Humidity::updateOrCreate(
                ['id' => $id],  // Menggunakan ID terakhir yang ditemukan
                [
                    'humidity' => $request->humidity,
                    'updated_at'=> Carbon::now(),
                ],  // Data yang akan diperbarui atau ditambahkan
            );

            return response()->json([
                'notifikasi' => 'Data berhasil disimpan',
                'type' => 'success',
                'data' => $humidity
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'notifikasi' => 'Gagal menyimpan data: ' . $e->getMessage(),
                'type' => 'error',
            ], 500);
        }
    }


}
