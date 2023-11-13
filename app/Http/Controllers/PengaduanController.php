<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.create', compact('pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = [
            'required' => ':attribute harus diisi ',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
        ];

        $this->validate($request, [
            'judul' => 'required|min:5|max:30',
            'isi' => 'required|min:5',
            'lokasi' => 'nullable|min:5'
        ], $message);

        $pengaduan = new Pengaduan;
        $pengaduan->judul = $request->judul;
        $pengaduan->isi = $request->isi;
        $pengaduan->lokasi = $request->lokasi;
        $pengaduan->save();

        toastr()->success('Pengaduan Berhasil Dibuat', 'Selesai!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('admin.createTanggapan', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => ':attribute harus diisi ',
            'mimes' => 'file :attribute harus bertype jpg, jpeg, png',
        ];

        $this->validate($request, [
            'tanggapan' => 'required',
            'foto_tanggapan' => 'mimes',
        ], $message);

        $pengaduan = Pengaduan::find($id);

        if ($request->file('foto') == "") {

            $pengaduan->tanggapan = $request->tanggapan;
            $pengaduan->save();
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/gambar/' . $pengaduan->foto_tanggapan);

            $file = $request->file('foto');
            $nama_file = time() . '-' . $file->getClientOriginalName();

            //proses upload
            $file->storeAs('public/gambar', $nama_file);

            $pengaduan->tanggapan = $request->tanggapan;
            $pengaduan->foto_tanggapan = $nama_file;
            $pengaduan->save();
        }
        
        return redirect()->route('tabadmin', compact('pengaduan'))->with('success', 'Data berhasil ditanggapi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pengaduan = Pengaduan::find($id);
        Storage::disk('local')->delete('public/gambar/' . $pengaduan->foto);
        $pengaduan->delete();

        toastr()->error('Data berhasil dihapus', 'Data Dihapus');
        return redirect(route('tabadmin'));
    }
}
