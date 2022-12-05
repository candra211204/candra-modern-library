@extends('layouts.app')

@section('judul', 'Tambah_Data_Kategori')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah_Data_Kategori') }}</div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label" for="nama">Nama</label>
                            <input class="form-control" type="text" name="nama" required>
                        </div>
                        <button class="btn btn-outline-primary form-control" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection