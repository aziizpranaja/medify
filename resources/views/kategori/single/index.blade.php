@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2">
                <a href="{{url('kategori/download-pdf/'.$kategori->id)}}" class="btn btn-success">
                    <i class="fas fa-download"></i> Download PDF
                </a>
                <a href="{{url('kategori/form/edit/'.$kategori->id)}}" class="btn btn-warning">Edit</a>
                <a href="{{url('kategori')}}" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
            </div>
            <div class="card">
                <div class="card-header">Detail Kategori</div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Informasi Kategori</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Kode Kategori:</strong></td>
                                    <td>{{ $kategori->kode }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Kategori:</strong></td>
                                    <td>{{ $kategori->nama }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <h5>Items dalam Kategori ini</h5>
                    @if($kategori->masterItems->count() > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Supplier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategori->masterItems as $item)
                                    <tr>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                        <td>{{ number_format($item->harga_beli + ($item->harga_beli * $item->laba / 100), 0, ',', '.') }}</td>
                                        <td>{{ $item->supplier }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
                            <strong>Belum ada item dalam kategori ini.</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection
