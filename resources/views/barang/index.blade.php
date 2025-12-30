@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h2>Daftar Alat Tulis</h2>
    </div>
    <div class="col text-end">
        <a href="{{ route('barang.index') }}" class="btn btn-secondary me-2">
            <i class="bi bi-arrow-clockwise"></i> Reset Filter
        </a>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Barang
        </a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form action="{{ route('barang.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="search" class="form-label">Cari Nama Barang</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" 
                               class="form-control" 
                               id="search" 
                               name="search" 
                               placeholder="Ketik nama barang..."
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <select class="form-select" id="kondisi" name="kondisi">
                        <option value="">Semua Kondisi</option>
                        <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Cukup" {{ request('kondisi') == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                        <option value="Rusak" {{ request('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if(request('search') || request('kondisi'))
<div class="alert alert-info">
    <i class="bi bi-info-circle"></i>
    Menampilkan hasil
    @if(request('search'))
        pencarian: <strong>"{{ request('search') }}"</strong>
    @endif
    @if(request('kondisi'))
        dengan kondisi: <strong>{{ request('kondisi') }}</strong>
    @endif
    <a href="{{ route('barang.index') }}" class="alert-link">Hapus filter</a>
</div>
@endif

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
                        <td colspan="6" class="text-center">
                            @if(request('search') || request('kondisi'))
                                Tidak ada data yang sesuai dengan pencarian
                            @else
                                Tidak ada data
                            @endif
                        </td>
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