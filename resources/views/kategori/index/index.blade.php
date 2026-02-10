@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2">
                <a href="{{url('kategori/form/new')}}" class="btn btn-secondary">+ Kategori Baru</a>
                <a href="{{url('master-items')}}" class="btn btn-primary">Master Items</a>
            </div>
            <div class="card">
                <div class="card-header">Daftar Kategori</div>

                <div class="card-body">
                    @include('kategori.index.filter')
                    @include('kategori.index.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('kategori.index.js')
@endsection
