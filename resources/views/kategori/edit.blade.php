@extends('layouts.app')

@section('judul', 'Edit_Data_Kategori')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit_Data_Kategori') }}</div>
                <div class="card-body">
                    <form action="{{ url('kategori/'.$kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label class="form-label" for="nama">Nama</label>
                            <input class="form-control" type="text" name="nama" value="{{ $kategori->nama }}" required>
                        </div>
                        <button class="btn btn-outline-primary form-control" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection