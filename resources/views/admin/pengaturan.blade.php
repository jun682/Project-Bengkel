<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - BengkelKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa-solid fa-gear text-secondary"></i> Pengaturan Sistem</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-dark text-white fw-bold py-3">
                    <i class="fa-solid fa-store me-1"></i> Profil Bengkel
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="fw-bold small">Nama Bengkel</label>
                            <input type="text" class="form-control" value="BengkelKita Service Center" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold small">Nomor WhatsApp API</label>
                            <input type="text" class="form-control" value="081234567890" required>
                            <small class="text-muted">Gunakan format 08xx. Nomor ini untuk notifikasi otomatis.</small>
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold small">Alamat Lengkap</label>
                            <textarea class="form-control" rows="3" required>Jl. Raya Otomotif No. 123, Jakarta</textarea>
                        </div>
                        <button type="button" class="btn btn-primary w-100 fw-bold">Simpan Profil</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-danger text-white fw-bold py-3">
                    <i class="fa-solid fa-shield-halved me-1"></i> Keamanan Akun Admin
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="fw-bold small">Nama Admin</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold small">Email Login</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" required>
                        </div>
                        <hr class="my-4">
                        <div class="mb-3">
                            <label class="fw-bold small">Password Baru <span class="text-muted">(Kosongkan jika tidak diubah)</span></label>
                            <input type="password" class="form-control" placeholder="Masukkan password baru">
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold small">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" placeholder="Ulangi password baru">
                        </div>
                        <button type="button" class="btn btn-danger w-100 fw-bold">Update Keamanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>