<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BengkelKita Service Center - Profesional Mobil & Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-teal: #1a5f6e; /* Warna Teal dari gambar */
            --primary-orange: #ff7f00; /* Warna Oranye dari gambar */
            --primary-green: #28a745; /* Warna Hijau dari tombol lacak */
            --text-dark: #333;
            --text-light: #fff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--text-dark);
        }

        /* --- Navbar Styles --- */
        .navbar {
            background-color: var(--text-light) !important;
            padding: 1rem 0;
        }
        .navbar-brand {
            color: var(--primary-teal) !important;
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.8rem;
        }
        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 400;
            margin: 0 10px;
        }
        .nav-link:hover {
            color: var(--primary-teal) !important;
        }
        .btn-booking-nav {
            background-color: var(--primary-orange);
            color: var(--text-light);
            font-weight: 600;
            border-radius: 5px;
            padding: 8px 20px;
            border: none;
        }
        .btn-booking-nav:hover {
            background-color: #e67200;
            color: var(--text-light);
        }

        /* --- Hero Section Styles --- */
        .hero-section {
            /* Menggunakan gambar placeholder yang mirip dengan mock-up */
            background-image: linear-gradient(rgba(26, 95, 110, 0.8), rgba(26, 95, 110, 0.6)), 
                              url('https://images.unsplash.com/photo-1487754162610-ffb80a65f9a7?q=80&w=2000');
            background-size: cover;
            background-position: center;
            color: var(--text-light);
            padding: 120px 0;
            position: relative;
        }
        .hero-title {
            font-weight: 700;
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .hero-subtitle {
            font-weight: 400;
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        .btn-hero-orange {
            background-color: var(--primary-orange);
            color: var(--text-light);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 5px;
            margin-right: 15px;
            border: none;
            font-size: 1.1rem;
        }
        .btn-hero-orange:hover {
            background-color: #e67200;
            color: var(--text-light);
        }
        .btn-hero-teal {
            background-color: transparent;
            color: var(--text-light);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 5px;
            border: 2px solid var(--text-light);
            font-size: 1.1rem;
        }
        .btn-hero-teal:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--text-light);
        }
        .trust-badge {
            margin-top: 30px;
            display: flex;
            align-items: center;
            font-size: 1rem;
            font-weight: 600;
        }
        .trust-badge i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* --- Services Section Styles --- */
        .services-section {
            margin-top: -60px; /* Overlap hero */
            position: relative;
            z-index: 10;
        }
        .service-card {
            background-color: var(--text-light);
            border: none;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
        }
        .service-icon {
            font-size: 3rem;
            color: var(--primary-teal);
            margin-bottom: 20px;
        }
        .service-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-bottom: 0;
        }

        /* --- Cek Status Section Styles --- */
        .status-section {
            padding: 80px 0;
        }
        .status-box {
            background-color: var(--text-light);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }
        .status-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 0;
            color: var(--text-dark);
        }
        .form-control-status {
            border-radius: 5px;
            padding: 12px;
            border: 1px solid #ced4da;
        }
        .btn-status-green {
            background-color: var(--primary-green);
            color: var(--text-light);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 5px;
            border: none;
            width: 100%;
        }
        .btn-status-green:hover {
            background-color: #218838;
            color: var(--text-light);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-title { font-size: 2.5rem; }
            .services-section { margin-top: 20px; }
            .service-card { margin-bottom: 20px; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <div>
                BengkelKita<br>
                <span style="font-size: 0.8rem; font-weight: 400; color: #666;">Service Center</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#cek-status">Cek Status</a></li>
                
                @guest
                    <li class="nav-item ms-2">
                        <a href="{{ route('login') }}" class="btn btn-booking-nav">Booking Servis</a>
                    </li>
                @else
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle fw-bold text-primary" href="#" id="userDropdown" data-bs-toggle="dropdown">
                            Halo, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<header class="hero-section text-center text-md-start">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h1 class="hero-title">Servis Mobil & Motor<br>Profesional. <span style="color: var(--primary-orange);">Buking Now!</span></h1>
                <p class="hero-subtitle">Mekanik Ahli. Jaminan Kepuasan 100%. Suku Cadang Asli.</p>
                <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-start">
                    <a href="{{ route('login') }}" class="btn btn-hero-orange mb-3 mb-sm-0">Booking Servis Online</a>
                    <a href="#" class="btn btn-hero-teal">Layanan Kami</a>
                </div>
                <div class="trust-badge justify-content-center justify-content-md-start">
                    <i class="fa-solid fa-shield-check text-success"></i> Pekerjaan Bergaransi!
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
</header>

<section class="services-section">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 justify-content-center">
            <div class="col">
                <div class="service-card h-100">
                    <i class="fa-solid fa-car-battery service-icon"></i>
                    <h5 class="service-title">Rutin & Tune-up</h5>
                </div>
            </div>
            <div class="col">
                <div class="service-card h-100">
                    <i class="fa-solid fa-gears service-icon"></i>
                    <h5 class="service-title">Penggantian Part</h5>
                </div>
            </div>
            <div class="col">
                <div class="service-card h-100">
                    <i class="fa-solid fa-bolt service-icon"></i>
                    <h5 class="service-title">Kelistrikan</h5>
                </div>
            </div>
            <div class="col">
                <div class="service-card h-100">
                    <i class="fa-solid fa-car-burst service-icon"></i>
                    <h5 class="service-title">Perawatan Bodi</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cek-status" class="status-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="status-box">
                    <form action="{{ route('cek.status') }}" method="GET">
                        <div class="row align-items-center g-3">
                            <div class="col-md-4">
                                <h4 class="status-title">Cek Status<br>Perbaikan</h4>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="kode_booking" class="form-control form-control-status" placeholder="Masukkan Kode Booking (Contoh: BKL-XYZ12)" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-status-green">Lacak Kendaraan</button>
                            </div>
                        </div>
                    </form>

                    @if(isset($booking))
                        <div class="alert alert-info mt-4 border-0 shadow-sm">
                            <h6 class="fw-bold mb-3"><i class="fa-solid fa-circle-info me-2"></i>Hasil Pelacakan:</h6>
                            <div class="row text-dark">
                                <div class="col-sm-6 mb-2"><strong>Kode:</strong> {{ $booking->kode_booking }}</div>
                                <div class="col-sm-6 mb-2"><strong>Pelanggan:</strong> {{ $booking->nama_pelanggan }}</div>
                                <div class="col-sm-6 mb-2"><strong>Kendaraan:</strong> {{ $booking->plat_nomor }}</div>
                                <div class="col-sm-6 mb-2">
                                    <strong>Status:</strong> 
                                    <span class="badge {{ $b->status == 'Selesai' ? 'bg-success' : ($b->status == 'Dikerjakan' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                        {{ $booking->status }}
                                    </span>
                                </div>
                                <div class="col-12 mt-2"><strong>Keluhan:</strong> <em>{{ $booking->keluhan }}</em></div>
                            </div>
                        </div>
                    @elseif(request()->has('kode_booking'))
                        <div class="alert alert-danger mt-4 border-0 shadow-sm">
                            <i class="fa-solid fa-circle-xmark me-2"></i>Kode booking tidak ditemukan. Silakan cek kembali kode Anda.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>