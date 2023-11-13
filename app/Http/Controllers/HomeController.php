<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::get();
        // dd($pengaduans);
        $pengumuman = Pengumuman::get();

        return view('user.index', compact('pengaduans', "pengumuman"));
    }
}
