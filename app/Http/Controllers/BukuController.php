<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data dari tabel buku
        $buku = Buku::all();
        
        // Ke halaman buku/tabel
        return view('buku.tabel', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ambil semua data dari tabel kategori
        $kategori = Kategori::all();
        
        // Ke halaman buku/tambah
        return view('buku.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi
        $validasi = $request->validate([
            'kategori_id' => 'required',
            'isbn' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'penerbit' => 'required',
            'cover' => 'required|image',
            'penulis' => 'required',
            'status' => 'required',
        ]);
        
        // Membuat folder untuk cover
        $file = $request->file('cover')->store('cover');
        
        // Validasi data cover
        $validasi['cover'] = $file;
        Buku::create($validasi);

        // Ke halaman buku/tabel
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find id di tabel buku
        $buku = Buku::findOrFail($id);

        // Ambil semua data di tabel kategori
        $kategori = Kategori::all();

        // Ke halaman buku/edit
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find id di tabel buku
        $buku = Buku::findOrFail($id);
        
        //Validasi
        $validasi = $request->validate([
            'kategori_id' => 'required',
            'isbn' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required',
            'status' => 'required',
        ]);
        $buku->update($validasi);

        // Cari cover berdasarkan id
        $coverLama = Buku::where('id', '=', $id)->first();
        
        // Pengkondisian jika cover ada maka lakukan aksi hapus
        if($request->file('cover')){
            $cover = public_path('storage/'.$coverLama->cover);
            if(File::exists($cover)){
                File::delete($cover);
            }
            $file = $request->file('cover')->store('cover');
            $buku->update([
                'cover' => $file
            ]);
        }

        // Ke halaman buku/tabel
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find id di tabel buku
        $buku = Buku::findOrFail($id);

        // Cari cover berdasarkan id
        $coverLama = Buku::where('id', '=', $id)->first();

        // Pengkondisian jika cover ada maka lakukan aksi hapus
        $cover = public_path('storage/'.$coverLama->cover);
        if(File::exists($cover)){
            File::delete($cover);
        }
        $buku->delete();

        // Ke halaman buku/tabel
        return redirect('buku');
    }
}
