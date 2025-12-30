@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h4>Edit Barang</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" 
                               class="form-control @error('nama_barang') is-invalid @enderror" 
                               id="nama_barang" 
                               name="nama_barang" 
                               value="{{ old('nama_barang', $barang->nama_barang) }}"
                               required>
                        @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" 
                                   class="form-control @error('jumlah') is-invalid @enderror" 
                                   id="jumlah" 
                                   name="jumlah" 
                                   value="{{ old('jumlah', $barang->jumlah) }}"
                                   min="0"
                                   required>
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" 
                                   class="form-control @error('satuan') is-invalid @enderror" 
                                   id="satuan" 
                                   name="satuan" 
                                   value="{{ old('satuan', $barang->satuan) }}"
                                   placeholder="contoh: buah, pack, dus"
                                   required>
                            @error('satuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select @error('kondisi') is-invalid @enderror" 
                                id="kondisi" 
                                name="kondisi" 
                                required>
                            <option value="">Pilih Kondisi</option>
                            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Cukup" {{ old('kondisi', $barang->kondisi) == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                            <option value="Rusak" {{ old('kondisi', $barang->kondisi) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                        @error('kondisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection