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
            <div class="card-body position-relative">
                <h4 class="card-title">List Data Buku</h4>
                </p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> ID Buku </th>
                            <th> Judul </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> Herman Beck </td>
                            <td> tersedia </td>
                            <td>
                                <a href="#" class="btn btn-gradient-success btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-gradient-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-gradient-danger btn-sm">
                                    <i class="fa fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection