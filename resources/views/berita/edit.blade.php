@extends('layouts.app')
@section('title', 'Edit Berita')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header text-dark" style="background: #fbbf24; font-weight: 600;">
                <i class="bi bi-pencil-square me-1"></i> Edit Berita
            </div>
            <div class="card-body p-4">
                <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                        <input type="text" name="judul" id="judul" class="form-control"
                        value="{{ old('judul', $berita->judul) }}">
                        @error('judul') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label fw-semibold">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach (['Olahraga', 'Pendidikan', 'Potensi', 'Pembangunan'] as $k)
                                <option value="{{ $k }}" @selected(old('kategori', $berita->kategori) == $k)>{{ $k }}</option>
                            @endforeach
                        </select>
                        @error('kategori') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">Ganti Gambar (Opsional)</label>
                        @if($berita->gambar)
                            <div class="mb-2">
                                <img src="{{ filter_var($berita->gambar, FILTER_VALIDATE_URL) ? $berita->gambar : asset('storage/'.$berita->gambar) }}" alt="Gambar Lama" style="height: 100px; border-radius: 5px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        @error('gambar') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                        <textarea name="isi" id="isi" rows="6" class="form-control">{{ old('isi', $berita->isi) }}</textarea>
                        @error('isi') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button type="submit" class="btn btn-warning fw-semibold text-dark">
                            <i class="bi bi-save me-1"></i> Update Berita
                        </button>
                        <a href="{{ route('berita.show', $berita) }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection