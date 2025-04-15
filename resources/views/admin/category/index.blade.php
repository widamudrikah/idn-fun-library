@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')

<div class="page-header">
    <h3 class="page-title">Data Kategori Buku Perpustakaan IDN</h3>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">List Kategori Buku</h4>
                    <button class="btn btn-rounded btn-gradient-info btn-sm" data-bs-toggle="modal" data-bs-target="#categoryModal">Tambah Kategori</button>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> ID Kategori </th>
                            <th> Nama </th>
                            <th> Action </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td> {{ $category->id }} </td>
                            <td> {{ $category->name }} </td>
                            <td>
                                <button class="btn btn-rounded btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#updateCategoryModal{{ $category->id }}">Edit</button>
                                <button class="btn btn-rounded btn-gradient-danger">Delete</button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="12">Tidak ada data kategori</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Add Category -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoryModalLabel">Tambah Kategori Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Kategori</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"  id="name" placeholder="Masukan Nama Kategori">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-gradient-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-rounded btn-gradient-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Update Category -->
 @foreach($categories as $category)
    <div class="modal fade" id="updateCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="categoryModalLabel">Update Kategori {{ $category->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Kategori</label>
                            <input name="name" value="{{ old('name', $category->name) }}" type="text" class="form-control @error('name') is-invalid @enderror"  id="name" placeholder="Masukan Nama Kategori">

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-gradient-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-rounded btn-gradient-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@if ($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));
        categoryModal.show();
    });
</script>
@endif

@endsection