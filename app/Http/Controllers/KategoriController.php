<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data dari tabel kategori
        $kategori = Kategori::all();
        
        // Ke halaman kategori/tabel
        return view('kategori.tabel', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ke halaman kategori/tambah
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Merequest semua inputan
        Kategori::create($request->all());
        
        // Redirect ke halaman kategori/tabel
        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find id di tabel kategori
        $kategori = Kategori::findOrFail($id);
        
        // Ke halaman kategori/edit
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find id di tabel kategori
        $kategori = Kategori::findOrFail($id);
        
        // Update data kategori
        $kategori->update($request->all());
        
        // Ke halaman kategori/tabel
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find id di tabel kategori
        $kategori = Kategori::findOrFail($id);
        
        // Hapus data kategori
        $kategori->delete();
        
        // Ke halaman kategori/tabel
        return redirect('kategori');
    }
}
