@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Detail Barang</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama Barang</th>
                        <td>{{ $barang->nama_barang }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $barang->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Kondisi</th>
                        <td>
                            @if($barang->kondisi == 'Baik')
                                <span class="badge bg-success">{{ $barang->kondisi }}</span>
                            @elseif($barang->kondisi == 'Rusak')
                                <span class="badge bg-danger">{{ $barang->kondisi }}</span>
                            @else
                                <span class="badge bg-warning">{{ $barang->kondisi }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>{{ $barang->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diupdate</th>
                        <td>{{ $barang->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection