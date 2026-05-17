<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Manual - BengkelKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa-solid fa-plus text-primary"></i> Input Booking Manual</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success fw-bold">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm col-md-8 mx-auto">
        <div class="card-body p-4">
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan nama pelanggan (Walk-in)" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>No. WhatsApp</label>
                        <input type="text" name="no_wa" class="form-control" placeholder="Contoh: 08123456789" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Plat Nomor Kendaraan</label>
                        <input type="text" name="plat_nomor" class="form-control" placeholder="Contoh: B 1234 XYZ" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Jadwal Servis</label>
                    <input type="date" name="jadwal_servis" class="form-control" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
                </div>
                <div class="mb-4">
                    <label>Keluhan Kendaraan</label>
                    <textarea name="keluhan" class="form-control" rows="3" placeholder="Deskripsikan keluhan pelanggan..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-bold py-2"><i class="fa-solid fa-save me-1"></i> Simpan Pesanan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>