@extends('layouts.app')

@section('judul', 'Edit_Data_Buku')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit_Data_Buku') }}</div>
                <div class="card-body">
                    <a class="btn btn-outline-primary mb-5" href="{{ url('buku') }}">Kembali</a>
                    <form action="{{ url('buku/'.$buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label class="form-label" for="nama">Kategori</label>
                            <select class="form-control" name="kategori_id">
                                <option selected>Klik untuk memilih kategori</option>
                                @foreach ($kategori as $kt)
                                    <option value="{{ $kt->id }}" @selected($buku->kategori_id == $kt->id)>{{ $kt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="isbn">ISBN</label>
                            <input class="form-control" type="number" name="isbn" value="{{ $buku->isbn }}" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="judul">Judul</label>
                            <input class="form-control" type="text" name="judul" value="{{ $buku->judul }}" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="sinopsis">Sinopsis</label>
                            <input class="form-control" type="text" name="sinopsis" value="{{ $buku->sinopsis }}" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="penerbit">Penerbit</label>
                            <input class="form-control" type="text" name="penerbit" value="{{ $buku->penerbit }}" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="cover">Cover</label>
                            <input class="form-control" type="file" name="cover" value="{{ $buku->cover }}">
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="penulis">Penulis</label>
                            <input class="form-control" type="text" name="penulis" value="{{ $buku->penulis }}" required>
                        </div>
                        @if (Auth::user()->role != 'admin')
                            <input class="form-control" type="hidden" name="status" value="aktif">
                        @endif
                        @if (Auth::user()->role == 'admin')
                        <div class="mb-5">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" name="status">
                                <option selected>Klik untuk memilih status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak">Tidak Aktif</option>
                            </select>
                        </div>
                        @endif
                        <button class="btn btn-outline-primary form-control" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection