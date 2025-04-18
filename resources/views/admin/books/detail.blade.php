@extends('template.base')

@section('title', 'Detail Buku')

@section('content')

@if(session('message'))
<div class="alert alert-warning">
    {{session('message')}}
</div>
@endif

<div class="page-header">
    <h3 class="page-title">Detail Buku</h3>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="{{ asset($book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
        </div>
    </div>

    <div class="col-md-8">
        <div class="card p-4">
            <h4 class="mb-3">{{ $book->title }}</h4>
            <p><strong>Penulis:</strong> {{ $book->author }} </p>
            <p><strong>Penerbit:</strong> {{ $book->publisher }} </p>
            <p><strong>Tahun Cetak:</strong> {{ $book->year }} </p>
            <p><strong>Kategori:</strong> {{ $book->category->name }} </p>
            <p><strong>Stok:</strong>
                @if($book->stock > 0)
                <span class="badge bg-success">Tersedia ({{ $book->stock }})</span>
                @else
                <span class="badge bg-danger">Tidak Tersedia</span>
                @endif
            </p>

            <div class="mt-3">
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Hapus</a>
                <a href="#" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection