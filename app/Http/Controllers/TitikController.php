<?php

namespace App\Http\Controllers;

use App\Models\Titik;
use Illuminate\Http\Request;

class TitikController extends Controller
{
    public function showKelolaTitikPage(){
        $titik = Titik::all();
        return view('pengelola.kelola-titik',[
            'dataTitik' => $titik,
        ]);
    }

    public function tambahTitik(Request $request) {
        $validatedData = $request->validate([
            'nama' => 'required',
        ]);

        $titik = new Titik();
        $titik->nama = $request->nama;

        if ($titik->save()) {
            return redirect()->back()->with([
                'notifikasi' => "Berhasil menambah data!",
                "type" => "success"
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => "Gagal menambah data!",
                "type" => "error",
            ]);
        }
    }

    public function editTitik(Request $request,$id_titik) {
        $validatedData = $request->validate([
            'nama' => 'required',
        ]);

        $titik = Titik::findOrFail($id_titik);
        $titik->nama = $request->nama;

        if ($titik->save()) {
            return redirect()->back()->with([
                'notifikasi' => "Berhasil mengubah data!",
                "type" => "success"
            ]);
        } else {
            return redirect()->back()->with([
                'notifikasi' => "Gagal mengubah data!",
                "type" => "error",
            ]);
        }
    }

    public function hapustitik($id_titik){
        $titik = Titik::findOrFail($id_titik);

        if ($titik->count() < 1) {
            return redirect()->back()->with([
                'notifikasi' =>'Data tidak ditemukan!',
                'type'=>'error'
            ]);
        }
        if ($titik->delete()) {
            return redirect()->back()->with([
                'notifikasi'=>"Berhasil menghapus titik!",
                "type"=>"success"
            ]);
        }else{
            return redirect()->back()->with([
                'notifikasi'=>"Gagal menghapus titik!",
                "type"=>"error",
            ]);
        }
    }
}
