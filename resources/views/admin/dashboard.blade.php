<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Owner - BengkelKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="#"><i class="fa-solid fa-gauge-high me-2"></i>Dashboard Owner</a>
        <div class="d-flex align-items-center">
            <span class="text-white me-3"><i class="fa-solid fa-user-tie me-1"></i> {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid px-4">
    
 <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
          <div class="card-body p-3 d-flex gap-2 flex-wrap">
    <a href="{{ route('admin.booking_manual') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Booking Manual</a>
    <a href="{{ route('admin.input_servis') }}" class="btn btn-success"><i class="fa-solid fa-wrench me-1"></i> Input Servis</a>
    
    <a href="{{ route('sparepart.index') }}" class="btn btn-warning text-dark"><i class="fa-solid fa-box me-1"></i> Update Stok</a>
    <a href="{{ route('laporan.index') }}" class="btn btn-info text-white"><i class="fa-solid fa-print me-1"></i> Laporan</a>
    
    <a href="{{ route('admin.pengaturan') }}" class="btn btn-secondary ms-auto"><i class="fa-solid fa-gear me-1"></i> Pengaturan</a>
</div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1" style="font-size: 0.8rem;">Booking Hari Ini</h6>
                            <h2 class="mb-0 fw-bold">{{ $bookingHariIni }} <span class="fs-6 fw-normal">Kendaraan</span></h2>
                        </div>
                        <i class="fa-solid fa-car fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-dark border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1" style="font-size: 0.8rem;">Sedang Dikerjakan</h6>
                            <h2 class="mb-0 fw-bold">{{ $sedangDikerjakan }} <span class="fs-6 fw-normal">Antrean</span></h2>
                        </div>
                        <i class="fa-solid fa-spinner fa-spin fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1" style="font-size: 0.8rem;">Pendapatan Hari Ini</h6>
                            <h2 class="mb-0 fw-bold">Rp {{ number_format($pendapatanHariIni, 0, ',', '.') }}</h2>
                        </div>
                        <i class="fa-solid fa-wallet fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-1" style="font-size: 0.8rem;">Stok Part Kritis</h6>
                            <h2 class="mb-0 fw-bold">{{ $stokKritis }} <span class="fs-6 fw-normal">Item</span></h2>
                        </div>
                        <i class="fa-solid fa-triangle-exclamation fa-2x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="fa-solid fa-chart-line text-primary me-1"></i> Tren Pendapatan (Bulan Ini)
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" style="height: 300px; width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4 h-100">
                <div class="card-header bg-white fw-bold py-3 text-danger">
                    <i class="fa-solid fa-bell me-1"></i> Notifikasi Stok Menipis
                </div>
                <div class="card-body d-flex align-items-center justify-content-center text-muted">
                    <p class="mb-0"><i class="fa-solid fa-check-circle text-success me-1"></i> Stok terpantau aman.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-5">
        <div class="card-header bg-white fw-bold py-3 d-flex justify-content-between align-items-center">
            <span><i class="fa-solid fa-list-check text-success me-1"></i> Riwayat Servis Terakhir</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-3">Kode / Tgl</th>
                            <th>Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $b)
                        <tr>
                            <td class="px-3">
                                <strong>{{ $b->kode_booking }}</strong><br>
                                <small class="text-muted">{{ $b->jadwal_servis }}</small>
                            </td>
                            <td>{{ $b->nama_pelanggan }}<br><small class="text-muted"><i class="fa-brands fa-whatsapp text-success"></i> {{ $b->no_wa }}</small></td>
                            <td><span class="badge bg-dark">{{ $b->plat_nomor }}</span></td>
                            <td>{{ Str::limit($b->keluhan, 30) }}</td>
                            <td>
                                <span class="badge {{ $b->status == 'Selesai' ? 'bg-success' : ($b->status == 'Dikerjakan' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                    {{ $b->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" title="Proses Servis"><i class="fa-solid fa-screwdriver-wrench"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada pesanan masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik diubah menjadi array berisi angka 0
    const ctx = document.getElementById('revenueChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: [0, 0, 0, 0], // Angka nol semua karena belum ada transaksi
                borderColor: '#1a5f6e',
                backgroundColor: 'rgba(26, 95, 110, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
</body>
</html>