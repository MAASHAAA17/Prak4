<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Berita & Informasi - Desa Jalatrang')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            background: #ffffff; 
            font-family: 'Inter', sans-serif; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .top-bar {
            background-color: #1a1a1a; color: #d1d5db; font-size: 0.75rem; padding: 8px 0; display: flex; align-items: center; border-bottom: 1px solid #333;
        }
        .info-terkini-badge {
            background: linear-gradient(90deg, #f97316 0%, #ea580c 100%); color: white; padding: 2px 8px; border-radius: 4px; font-weight: 700; margin-right: 15px; font-size: 0.7rem;
        }
        .running-text { flex-grow: 1; white-space: nowrap; overflow: hidden; position: relative; }
        .running-text p { margin: 0; display: inline-block; animation: marquee 25s linear infinite; }
        @keyframes marquee { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }

        .navbar-desa { background: #1e293b; padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .desa-title { font-size: 1.1rem; font-weight: 800; color: #f8fafc; line-height: 1.1; letter-spacing: 0.5px; }
        .desa-subtitle { font-size: 0.65rem; color: #94a3b8; display: block; text-transform: uppercase; letter-spacing: 0.5px;}
        
        .nav-menus { display: flex; align-items: center; }
        .nav-menus a { color: #e2e8f0; text-decoration: none; font-size: 0.85rem; margin-left: 20px; font-weight: 600; transition: all 0.2s; }
        .nav-menus a:hover { color: #fbbf24; }
        .nav-menus a.active { color: #fbbf24; border: 1px solid rgba(251, 191, 36, 0.3); border-radius: 20px; padding: 4px 15px; background: rgba(251, 191, 36, 0.1); }
        .grid-menu-btn { background: rgba(251, 191, 36, 0.1); color: #fbbf24; border: 1px solid #fbbf24; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; margin-left: 20px; cursor: pointer; }

        .hero-banner { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #1e3a8a 100%); color: white; padding: 30px 0 80px 0; margin-bottom: -40px; }
        .breadcrumb-custom { font-size: 0.85rem; color: #93c5fd; margin-bottom: 25px; font-weight: 500; }
        .breadcrumb-custom a { color: #93c5fd; text-decoration: none; }
        .breadcrumb-custom span { color: white; margin-left: 8px; }
        .hero-banner h1 { font-weight: 800; font-size: 2.2rem; letter-spacing: -0.5px; margin-bottom: 5px; }
        .hero-banner p { color: #bfdbfe; font-size: 0.95rem; font-weight: 400; }

        .filter-box { background: #fff; border-radius: 8px; border: 1px solid #e5e7eb; overflow: hidden; }
        .filter-header { background: #1e3a8a; color: #fff; padding: 14px 16px; font-weight: 600; font-size: 0.95rem; display: flex; align-items: center; }
        .filter-body { padding: 20px 16px; }
        .form-label { font-size: 0.85rem; color: #374151; font-weight: 600; margin-bottom: 6px; }
        .form-control, .form-select { font-size: 0.85rem; padding: 8px 12px; border-color: #d1d5db; }
        .btn-cari { background: #2563eb; color: white; font-weight: 600; font-size: 0.85rem; padding: 8px; border: none; }
        .btn-reset { border: 1px solid #d1d5db; color: #4b5563; font-weight: 600; font-size: 0.85rem; padding: 8px; background: white; }

        .card-berita { border: 1px solid #f3f4f6; border-radius: 12px; overflow: hidden; transition: all 0.3s ease; }
        .card-berita:hover { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); transform: translateY(-3px); }
        .card-img-wrapper { position: relative; width: 100%; height: 180px; overflow: hidden; }
        .card-img-wrapper img { width: 100%; height: 100%; object-fit: cover; }
        .badge-kategori { background: #1e293b; font-weight: 600; font-size: 0.7rem; padding: 4px 10px; border-radius: 4px; }
        .card-date { font-size: 0.75rem; color: #6b7280; font-weight: 500; }
        .card-title-link { font-size: 1.05rem; font-weight: 700; color: #111827; text-decoration: none; line-height: 1.4; display: block; }
        .card-title-link:hover { color: #2563eb; }
        .card-excerpt { font-size: 0.85rem; color: #4b5563; line-height: 1.6; margin-top: 10px; }
        .tag-pill { background: #f3f4f6; color: #6b7280; border-radius: 4px; padding: 3px 8px; font-size: 0.7rem; font-weight: 500; }

        .main-content-wrapper { flex: 1; }
        .footer-desa { background-color: #0f172a; border-top: 4px solid #1e3a8a; margin-top: 60px; }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a { color: #94a3b8; text-decoration: none; font-size: 0.9rem; transition: color 0.2s; }
        .footer-links a:hover { color: #fbbf24; }
        .footer-bottom { background-color: #020617; border-top: 1px solid #1e293b; }
    </style>
</head>
<body>

    <div class="top-bar">
        <div class="container d-flex align-items-center">
            <span class="info-terkini-badge"><i class="bi bi-megaphone-fill me-1"></i> INFO TERKINI</span>
            <div class="running-text">
                <p><i class="bi bi-circle-fill text-warning" style="font-size:0.4rem; margin:0 8px; vertical-align:middle;"></i> bayaran PBB pada website <i class="bi bi-circle-fill text-warning" style="font-size:0.4rem; margin:0 8px; vertical-align:middle;"></i> Desa Jalatrang akan membuka layanan public untuk mempermudah akses informasi dan pelayanan masyarakat</p>
            </div>
            <div class="ms-auto d-none d-md-block text-end" style="min-width: 150px;">
                <i class="bi bi-clock text-warning me-1"></i> {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>
    </div>

    <nav class="navbar-desa">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <!-- LOGO ATAS PAKAI LINK -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" style="height: 48px; margin-right: 12px; object-fit: contain;">
                <div>
                    <span class="desa-title">PEMERINTAH DESA JALATRANG</span>
                    <span class="desa-subtitle">KECAMATAN CIPAKU KABUPATEN CIAMIS</span>
                </div>
            </div>
            <div class="nav-menus d-none d-xl-flex">
                <a href="#"><i class="bi bi-house-door-fill"></i></a>
                <a href="#">Profil</a>
                <a href="#">Kependudukan</a>
                <a href="{{ route('berita.index') }}" class="active">Berita</a>
                <a href="#">Potensi Wisata</a>
                <a href="#">IDM & SDGs</a>
                <a href="#">Ketahanan Pangan</a>
                <a href="#">Keuangan</a>
                <a href="#">Download</a>
                <div class="grid-menu-btn"><i class="bi bi-grid-3x3-gap-fill"></i></div>
            </div>
        </div>
    </nav>

    <div class="hero-banner">
        <div class="container">
            <div class="breadcrumb-custom">
                <a href="#">Beranda</a> <span>Berita</span>
            </div>
            <h1>Berita & Informasi</h1>
            <p>Informasi terkini dari Desa Jalatrang</p>
        </div>
    </div>

    <div class="main-content-wrapper container" style="margin-top: 50px; margin-bottom: 40px;">
        @yield('content')
    </div>

    <footer class="footer-desa">
        <div class="container py-5">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <!-- LOGO BAWAH PAKAI LINK -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px; margin-right: 15px; object-fit: contain;">
                        <div>
                            <h5 class="mb-0 fw-bold text-white" style="letter-spacing: 0.5px;">DESA JALATRANG</h5>
                            <small style="color: #94a3b8; letter-spacing: 0.5px; font-size:0.7rem;">KEC. CIPAKU, KAB. CIAMIS</small>
                        </div>
                    </div>
                    <p style="font-size: 0.9rem; color: #94a3b8; line-height: 1.6; padding-right: 20px;">
                        Website Resmi Pemerintah Desa Jalatrang. Media komunikasi dan transparansi publik untuk mempermudah akses informasi serta pelayanan bagi masyarakat.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-bold mb-4">Tautan Cepat</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#"><i class="bi bi-chevron-right" style="font-size:0.7rem; color:#3b82f6; margin-right:5px;"></i> Profil Desa</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right" style="font-size:0.7rem; color:#3b82f6; margin-right:5px;"></i> Data Kependudukan</a></li>
                        <li><a href="{{ route('berita.index') }}"><i class="bi bi-chevron-right" style="font-size:0.7rem; color:#3b82f6; margin-right:5px;"></i> Berita & Informasi</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right" style="font-size:0.7rem; color:#3b82f6; margin-right:5px;"></i> Potensi Wisata</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h6 class="text-white fw-bold mb-4">Hubungi Kami</h6>
                    <ul class="list-unstyled" style="font-size: 0.9rem; color: #94a3b8;">
                        <li class="mb-3 d-flex"><i class="bi bi-geo-alt-fill text-warning me-3 fs-5"></i><span>Jl. Raya Jalatrang No. 1, Desa Jalatrang, Kec. Cipaku, Kab. Ciamis, Jawa Barat 46252</span></li>
                        <li class="mb-3 d-flex"><i class="bi bi-envelope-fill text-warning me-3 fs-5"></i><span>pemdes@jalatrang.id</span></li>
                        <li class="mb-3 d-flex"><i class="bi bi-telephone-fill text-warning me-3 fs-5"></i><span>(0265) 1234567</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div class="container text-center">
                <small style="color: #64748b; font-weight: 500;">&copy; {{ date('Y') }} Pemerintah Desa Jalatrang. All Rights Reserved.</small>
            </div>
        </div>
    </footer>
</body>
</html>