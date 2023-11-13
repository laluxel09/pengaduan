<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TabadminController extends Controller
{
    public function index()
    {

        $pengaduans = Pengaduan::get();
        return view('admin.tabadmin', compact('pengaduans'));
    }

    public function create($id)
    {

        $pengaduan = Pengaduan::find($id);

        return view('admin.createTanggapan', compact('pengaduan'));
    }

    public function delete($id)
    {

        
        $pengaduans = pengaduan::find($id);
        // File::disk('local')->delete('public/gambar/' . $pengaduans->photo);
        File::delete('storage/gambar/'. $pengaduans->photo);
        $pengaduans->delete();

        return redirect()->route('tabadmin')->with('message', 'Data berhasil dihapus');
    }
}
