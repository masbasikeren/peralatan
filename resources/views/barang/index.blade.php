@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h2>Daftar Alat Tulis</h2>
    </div>
    <div class="col text-end">
        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Barang
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="30%">Nama Barang</th>
                        <th width="10%">Jumlah</th>
                        <th width="10%">Satuan</th>
                        <th width="15%">Kondisi</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $index => $barang)
                    <tr>
                        <td>{{ $barangs->firstItem() + $index }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->jumlah }}</td>
                        <td>{{ $barang->satuan }}</td>
                        <td>
                            @if($barang->kondisi == 'Baik')
                                <span class="badge bg-success">{{ $barang->kondisi }}</span>
                            @elseif($barang->kondisi == 'Rusak')
                                <span class="badge bg-danger">{{ $barang->kondisi }}</span>
                            @else
                                <span class="badge bg-warning">{{ $barang->kondisi }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Lihat
                            </a>
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $barangs->links() }}
        </div>
    </div>
</div>
@endsection