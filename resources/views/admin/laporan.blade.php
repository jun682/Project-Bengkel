<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan BengkelKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Khusus untuk Mode Cetak (Print) */
        @media print {
            .no-print { display: none !important; } /* Sembunyikan tombol saat dicetak */
            body { background-color: white !important; }
            .card { border: none !important; box-shadow: none !important; }
        }
        .kop-surat { border-bottom: 3px solid #000; padding-bottom: 15px; margin-bottom: 20px; }
    </style>
</head>
<body class="bg-light p-4">

<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-5">
            
            <div class="d-flex justify-content-between mb-4 no-print">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                <button onclick="window.print()" class="btn btn-primary"><i class="fa-solid fa-print"></i> Cetak PDF / Print</button>
            </div>

            <div class="text-center kop-surat">
                <h2 class="fw-bold mb-1">BENGKELKITA SERVICE CENTER</h2>
                <p class="mb-0">Jl. Raya Otomotif No. 123, Jakarta | Telp: 0812-3456-7890</p>
                <p class="mb-0">Email: admin@bengkelkita.com | Website: www.bengkelkita.com</p>
            </div>

            <h4 class="text-center fw-bold mb-4">LAPORAN DATA SERVIS KENDARAAN</h4>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Tanggal Dicetak:</strong> {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
                    <p class="mb-1"><strong>Dicetak Oleh:</strong> {{ Auth::user()->name }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-1"><strong>Total Transaksi:</strong> {{ $totalPesanan }} Kendaraan</p>
                </div>
            </div>

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No.</th>
                        <th>Kode Booking</th>
                        <th>Tanggal Servis</th>
                        <th>Nama Pelanggan</th>
                        <th>No. Plat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $index => $b)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center fw-bold">{{ $b->kode_booking }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($b->jadwal_servis)->format('d/m/Y') }}</td>
                        <td>{{ $b->nama_pelanggan }}</td>
                        <td class="text-center">{{ $b->plat_nomor }}</td>
                        <td class="text-center">{{ $b->status }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-3">Belum ada data servis untuk dicetak.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="row mt-5">
                <div class="col-8"></div>
                <div class="col-4 text-center">
                    <p class="mb-5">Mengetahui,<br><strong>Owner BengkelKita</strong></p>
                    <p class="mt-5 mb-0">_______________________</p>
                    <p class="fw-bold">{{ Auth::user()->name }}</p>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>