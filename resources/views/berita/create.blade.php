@extends('layouts.app')
@section('title', 'Tambah Berita')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header text-white" style="background: #1e3a8a; font-weight: 600;">
                <i class="bi bi-plus-circle-fill me-1"></i> Tambah Berita
            </div>
            <div class="card-body p-4">
                <!-- WAJIB ADA enctype="multipart/form-data" AGAR BISA UPLOAD GAMBAR -->
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                        value="{{ old('judul') }}" placeholder="Masukkan judul berita...">
                        @error('judul') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label fw-semibold">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach (['Olahraga', 'Pendidikan', 'Potensi', 'Pembangunan'] as $k)
                                <option value="{{ $k }}" @selected(old('kategori') == $k)>{{ $k }}</option>
                            @endforeach
                        </select>
                        @error('kategori') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- INI ADALAH INPUT UNTUK UPLOAD GAMBAR -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">Upload Gambar (Opsional)</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                        @error('gambar') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB.</small>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                        <textarea name="isi" id="isi" rows="6" class="form-control"
                                  placeholder="Tulis isi berita di sini...">{{ old('isi') }}</textarea>
                        @error('isi') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-primary" style="background: #2563eb;">
                            <i class="bi bi-save me-1"></i> Simpan Berita
                        </button>
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection