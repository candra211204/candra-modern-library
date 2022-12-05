@extends('layouts.app')

@section('judul', 'beranda')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            @foreach ($buku as $li)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $li->judul }}</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <img src="{{ asset('storage/'. $li->cover) }}" alt="" width="300">
                        </div>
                        <hr>
                        <h5><p><b>Kategori :</b>{{ $li->kategori->nama }}</p></h5>
                        <h5><p><b>Isbn :</b>{{ $li->isbn }}</p></h5>
                        <h5><p><b>Sinopsis :</b>{{ $li->sinopsis }}</p></h5>
                        <h5><p><b>Penerbit :</b>{{ $li->penerbit }}</p></h5>
                        <h5><p><b>Penulis :</b>{{ $li->penulis }}</p></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection