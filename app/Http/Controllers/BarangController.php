<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        //get posts
        $barang = barang::latest()->paginate();

        //render view with posts
        return view('barang.index', compact('barang'));
    }
    public function create()
    {
        return view('barang.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_barang'     => 'required',
            'gambar'     => 'required',
            'kondisi'     => 'required',

        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/barang', $gambar->hashName());

        //create barang
        barang::create([
            'nama_barang'     => $request->nama_barang,
            'gambar'     => $gambar->hashName(),
            'kondisi'     => $request->kondisi,

        ]);

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, barang $barang)
    {
        //validate form
        $this->validate($request, [
            'nama_barang'     => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kondisi'     => 'required',

        ]);
        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/barang', $gambar->hashName());

            //delete old image
            Storage::delete('public/barang/'.$barang->gambar);

            //update post with new image
            $barang->update([
                'nama_barang'     => $request->nama_barang,
                'gambar'     => $gambar->hashName(),
                'kondisi'     => $request->kondisi,

            ]);

        } else {

            //update post without image
            $barang->update([
                'nama_barang'     => $request->nama_barang,
                'kondisi'     => $request->kondisi,
            ]);

        }

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy(barang $barang)
    {

        //delete post
        $barang->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
