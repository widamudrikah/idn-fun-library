@extends('template.base')

@section('title', 'Dashboard Admin')

@section('content')

@if(session('message'))
<div class="alert alert-warning">
    {{session('message')}}
</div>
@endif

<div class="page-header">
    <h3 class="page-title">Data Buku Perpustakaan IDN</h3>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">List Buku</h4>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection