@extends('layouts.app')
@section('title', $berita->judul)

@section('content')
<!-- Tombol Kembali ditaruh di luar grid agar rapi -->
<div class="mb-3 mt-4">
    <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
    </a>
</div>

<div class="row">
    <!-- KOLOM KIRI: Isi Berita Utama (Lebar: 8 kolom) -->
    <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <!-- Kategori, Tanggal, Penulis, dan View -->
                <div class="d-flex flex-wrap align-items-center gap-3 mb-3 border-bottom pb-3">
                    <span class="badge text-white" style="background: #1e293b;">{{ $berita->kategori }}</span>
                    <small class="text-muted"><i class="bi bi-calendar3"></i> {{ $berita->created_at->format('d M Y') }}</small>
                    <small class="text-muted"><i class="bi bi-person-circle"></i> {{ $berita->penulis }}</small>
                    <small class="text-muted"><i class="bi bi-eye"></i> Dilihat {{ $berita->dilihat }} kali</small>
                </div>

                <!-- Judul Berita -->
                <h2 class="fw-bold mb-4" style="color: #1e3a8a; line-height: 1.4;">{{ $berita->judul }}</h2>

                <!-- Gambar Berita -->
                <img src="{{ filter_var($berita->gambar, FILTER_VALIDATE_URL) ? $berita->gambar : ($berita->gambar ? asset('storage/'.$berita->gambar) : 'https://placehold.co/800x400?text=Berita+Desa') }}"
                     class="img-fluid rounded mb-4 w-100" style="max-height: 450px; object-fit: cover;" alt="{{ $berita->judul }}">

                <!-- Isi Berita -->
                <div class="berita-content" style="font-size: 1.05rem; line-height: 1.8; color: #374151;">
                    {!! nl2br(e($berita->isi)) !!}
                </div>
                
                <!-- Tag/Hashtag -->
                <div class="mt-5 pt-4 border-top">
                    <span class="fw-bold me-2" style="font-size: 0.9rem;">Tags:</span>
                    <span class="tag-pill" style="background: #f3f4f6; color: #6b7280; border-radius: 4px; padding: 4px 10px; font-size: 0.8rem; font-weight: 500; margin-right: 5px;">#{{ strtolower(str_replace(' ', '', $berita->kategori)) }}</span>
                    <span class="tag-pill" style="background: #f3f4f6; color: #6b7280; border-radius: 4px; padding: 4px 10px; font-size: 0.8rem; font-weight: 500; margin-right: 5px;">#desa</span>
                    <span class="tag-pill" style="background: #f3f4f6; color: #6b7280; border-radius: 4px; padding: 4px 10px; font-size: 0.8rem; font-weight: 500; margin-right: 5px;">#jalatrang</span>
                </div>

                <!-- Tombol Aksi Admin -->
                <div class="d-flex justify-content-end gap-2 mt-5 pt-3 border-top bg-light p-3 rounded">
                    <span class="me-auto text-muted small fw-bold align-self-center"><i class="bi bi-shield-lock"></i> Area Admin:</span>
                    <a href="{{ route('berita.edit', $berita) }}" class="btn btn-warning btn-sm fw-semibold text-dark">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm fw-semibold">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- KOLOM KANAN: Berita Lainnya (Lebar: 4 kolom) -->
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h6 class="mb-0 fw-bold" style="color: #1e3a8a;">
                    <i class="bi bi-newspaper me-2"></i> Berita Terbaru Lainnya
                </h6>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse ($beritaLain as $item)
                        <li class="list-group-item p-3 border-0 border-bottom">
                            <div class="d-flex gap-3 align-items-center">
                                <!-- Gambar Thumbnail -->
                                <a href="{{ route('berita.show', $item) }}" class="flex-shrink-0">
                                    <img src="{{ filter_var($item->gambar, FILTER_VALIDATE_URL) ? $item->gambar : ($item->gambar ? asset('storage/'.$item->gambar) : 'https://placehold.co/150x150?text=Berita') }}" 
                                         alt="{{ $item->judul }}" 
                                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                </a>
                                
                                <!-- Judul & Tanggal -->
                                <div>
                                    <h6 class="mb-1" style="font-size: 0.95rem; line-height: 1.3;">
                                        <a href="{{ route('berita.show', $item) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ Str::limit($item->judul, 45) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="bi bi-calendar3"></i> {{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item p-4 text-center text-muted">
                            <small>Belum ada berita lainnya.</small>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection