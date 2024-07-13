<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|size:9|unique:mahasiswa',
            'nama' => 'required|string|min:2|max:25|max:25',
            'tempat_lahir' => 'required|string|min:2',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|string|min:4',
            'jumlah_saudara_kandung' => 'required|numeric',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama_mhs' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tanggal_lahir,
            'jns_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'jlh_saudara_kandung' => $request->jumlah_saudara_kandung,
        ]);

        return redirect('/')->with('success', 'Berhasil menambahkan mahasiswa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $mhs = Mahasiswa::where('nim', $nim)->first();
        
        return view('edit', compact('mhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required|string|min:2|max:25',
            'tempat_lahir' => 'required|string|min:2|max:25',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|string|min:4',
            'jumlah_saudara_kandung' => 'required|numeric',
        ]);

        Mahasiswa::where('nim', $nim)->update([
            'nama_mhs' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jlh_saudara_kandung' => $request->jumlah_saudara_kandung,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        Mahasiswa::where('nim', $nim)->delete();

        return redirect('/')->with('success', 'Berhasil menghapus mahasiswa!');
    }
}
