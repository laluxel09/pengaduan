<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function index()
    {

        $pengumumans = Pengumuman::all();
        return view('admin.pengadmin', compact('pengumumans'));
    }
    public function create(Request $request)
    {
        return view('admin.createpengumuman');
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'judul' => "required",
            'isi' => "required"
        ]);
        
        if ($validator->fails()) {
            return back()->with('warning', $validator->messages()->first());
        }

        // dd('masuk');

        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;

        $pengumuman->save();



        if ($pengumuman) {
            return redirect(route('pengumuman'))->with('success', "Pengumuman Berhasil Dibuat");
        } else {
            return redirect(route('pengumuman'))->with('error', "Pengumuman Gagal Dibuat");
        }
    }

    public function edit(Request $request, $id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('admin.editPengumuman', compact('pengumuman'));
    }

    public function update(Request $request, $id) 
    {
        
        $pengumuman = Pengumuman::find($id);

        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $pengumuman->save();

        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil diedit');
    }

    public function delete($id)
    {

        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        toastr()->error('Pengumuman berhasil dihapus', 'Pengumuman Dihapus');
        return redirect(route('pengumuman'));
    }
}
