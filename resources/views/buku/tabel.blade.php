@extends('layouts.app')

@section('judul', 'Tabel_Buku')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Tabel_Buku') }}</div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ route('buku.create') }}">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Isbn</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $li)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $li->kategori->nama }}</td>
                            <td>{{ $li->isbn }}</td>
                            <td>{{ $li->judul }}</td>
                            <td>{{ $li->sinopsis }}</td>
                            <td>{{ $li->penerbit }}</td>
                            <td>
                                <img src="{{ asset('storage/'. $li->cover) }}" alt="" width="200">
                            </td>
                            <td>{{ $li->penulis }}</td>
                            <td>{{ $li->status }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ url('buku/'.$li->id.'/edit') }}">Edit</a>
                                <a class="btn btn-outline-danger" href="{{ url('hapusBuku/'.$li->id) }}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection