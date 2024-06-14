<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function showKelolaPelangganPage() {
        $pelanggan = User::where('roles','pelanggan')->get();

        return view('pengelola.kelola-pengguna',[
            'dataPelanggan' => $pelanggan,
        ]);
    }

    public function editPelanggan(Request $request,$id_pelanggan) {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $pelanggan = User::findOrFail($id_pelanggan);
        $pelanggan->status = $request->status;

        if ($pelanggan->save()) {
            return redirect()->back()->with([
                'notifikasi' => "Berhasil mengubah status!",
                "type" => "success"
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => "Gagal mengubah status!",
                "type" => "error",
            ]);
        }
    }

    public function hapusPelanggan($id_pelanggan){
        $pelanggan = User::findOrFail($id_pelanggan);

        if ($pelanggan->count() < 1) {
            return redirect()->back()->with([
                'notifikasi' =>'Data tidak ditemukan!',
                'type'=>'error'
            ]);
        }
        if ($pelanggan->delete()) {
            return redirect()->back()->with([
                'notifikasi'=>"Berhasil menghapus pelanggan!",
                "type"=>"success"
            ]);
        }else{
            return redirect()->back()->with([
                'notifikasi'=>"Gagal menghapus pelanggan!",
                "type"=>"error",
            ]);
        }
    }
}
