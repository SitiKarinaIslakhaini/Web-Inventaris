<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\peminjaman;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = peminjaman::all();
        return view('peminjaman.index',compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = siswa::all();
        $item = barang::all();
        return view('peminjaman.create', compact('data','item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'siswa_id'   => 'required',
            'barang_id'   => 'required',
            'tgl_pinjam'   => 'required',
            'tgl_kembali'   => 'required',

        ]);
        peminjaman::create([
            'siswa_id'     => $request->siswa_id,
            'barang_id'     => $request->barang_id,
            'tgl_pinjam'   => $request->tgl_pinjam,
            'tgl_kembali'   => $request->tgl_kembali,

        ]);

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(peminjaman $peminjaman)
    {
        $data = siswa::all();
        $item = barang::all();
        $pinjam = peminjaman::all();
        return view('peminjaman.edit', compact('peminjaman','data','item','pinjam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, peminjaman $peminjaman)
    {
        $this->validate($request, [
            'siswa_id'     => 'required',
            'barang_id'     => 'required',
            'tgl_pinjam'     => 'required',
            'tgl_kembali'     => 'required',

        ]);


        $peminjaman->update([
            'siswa_id'     => $request->siswa_id,
            'barang_id'     => $request->barang_id,
            'tgl_pinjam'   => $request->tgl_pinjam,
            'tgl_kembali'   => $request->tgl_kembali,

        ]);


        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(peminjaman $peminjaman)
    {
            //delete post
            $peminjaman->delete();

            //redirect to index
            return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
