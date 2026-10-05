@extends('layouts.app')
@section('title', 'Berita & Informasi - Desa Jalatrang')

@section('content')
<div class="row">
    <!-- Kolom Kiri: Filter -->
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="filter-box">
            <div class="filter-header">
                <i class="bi bi-funnel-fill me-2"></i> Filter Berita
            </div>
            <div class="filter-body">
                <form method="GET" action="{{ route('berita.index') }}">
                    <div class="mb-3">
                        <label class="form-label">Kata Kunci</label>
                        <input type="text" name="kata_kunci" class="form-control"
                        value="{{ request('kata_kunci') }}" placeholder="Cari berita...">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach (['Olahraga', 'Pendidikan', 'Potensi', 'Pembangunan'] as $k)
                                <option value="{{ $k }}" @selected(request('kategori') == $k)>{{ $k }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-cari w-100 mb-2">Cari</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-reset w-100 d-block text-center text-decoration-none">Reset</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Grid Berita -->
    <div class="col-lg-9 col-md-8">
        <div class="row g-4">
            @forelse ($beritas as $berita)
                <div class="col-lg-4 col-md-6">
                    <div class="card card-berita h-100 d-flex flex-column border-0">
                        <!-- Gambar Berita -->
                        <a href="{{ route('berita.show', $berita) }}" class="card-img-wrapper">
                            <img src="{{ filter_var($berita->gambar, FILTER_VALIDATE_URL) ? $berita->gambar : ($berita->gambar ? asset('storage/'.$berita->gambar) : 'https://placehold.co/600x400?text=Berita') }}" 
                                 alt="{{ $berita->judul }}">
                        </a>
                        
                        <div class="card-body d-flex flex-column p-3">
                            <!-- Kategori & Tanggal -->
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge badge-kategori text-white me-2">{{ $berita->kategori }}</span>
                                <span class="card-date"><i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at->format('d M Y') }}</span>
                            </div>
                            
                            <!-- Judul Berita -->
                            <h6 class="mb-2 mt-1">
                                <a href="{{ route('berita.show', $berita) }}" class="card-title-link">
                                    {{ Str::limit($berita->judul, 60) }}
                                </a>
                            </h6>
                            
                            <!-- Excerpt/Isi Singkat -->
                            <p class="card-excerpt flex-grow-1 mb-0">
                                {{ Str::limit($berita->isi, 80) }}
                            </p>
                            
                            <!-- Hashtags -->
                            <div class="tags-container">
                                <span class="tag-pill">#{{ strtolower(str_replace(' ', '', $berita->kategori)) }}</span>
                                <span class="tag-pill">#desa</span>
                                <span class="tag-pill">#jalatrang</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info border-0 shadow-sm rounded-3">Belum ada berita yang diterbitkan.</div>
                </div>
            @endforelse
        </div>
        
        <!-- Paginasi -->
        <div class="d-flex justify-content-center justify-content-lg-end mt-4">
            {{ $beritas->links() }}
        </div>
    </div>
</div>
@endsection