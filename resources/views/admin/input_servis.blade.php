<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Aktivitas Servis - BengkelKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa-solid fa-screwdriver-wrench text-success"></i> Proses & Input Aktivitas Servis</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>

    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="fa-solid fa-clock-history text-warning me-1"></i> Antrean Kendaraan Aktif
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-3">Pelanggan / Kendaraan</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th class="text-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $b)
                                <tr>
                                    <td class="px-3">
                                        <strong class="text-primary">{{ $b->plat_nomor }}</strong><br>
                                        <small class="text-muted">{{ $b->nama_pelanggan }}</small>
                                    </td>
                                    <td><small>{{ Str::limit($b->keluhan, 40) }}</small></td>
                                    <td>
                                        <span class="badge {{ $b->status == 'Dikerjakan' ? 'bg-warning text-dark' : 'bg-secondary' }}">
                                            {{ $b->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button onclick="pilihKendaraan('{{ $b->id }}', '{{ $b->plat_nomor }}', '{{ $b->nama_pelanggan }}', '{{ $b->status }}', '{{ $b->sparepart_id }}')" class="btn btn-sm btn-success fw-bold">
                                            Pilih <i class="fa-solid fa-chevron-right ms-1"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Tidak ada kendaraan dalam antrean aktif.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header bg-dark text-white fw-bold py-3">
                    <i class="fa-solid fa-pen-to-square me-1"></i> Form Pembaruan Servis
                </div>
                <div class="card-body p-4" id="form-placeholder">
                    <p class="text-center text-muted my-5"><i class="fa-solid fa-arrow-left d-block fa-2x mb-2 text-secondary"></i> Silakan klik tombol <strong>Pilih</strong> pada daftar antrean kendaraan di sebelah kiri untuk memproses.</p>
                </div>

                <div class="card-body p-4 d-none" id="form-asli">
                    <form id="form-update-servis" method="POST" action="">
                        @csrf
                        <div class="mb-3 bg-light p-3 rounded border">
                            <label class="text-muted small d-block">KENDARAAN SEDANG DIPROSES</label>
                            <h4 class="fw-bold text-dark mb-0" id="txt-plat">B 1234 XYZ</h4>
                            <span class="text-muted small" id="txt-nama">Nama Pemilik</span>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold small mb-2">Update Status Pengerjaan</label>
                        <select name="status" id="select-status" class="form-select" required>
                            <option value="Menunggu">Menunggu Konfirmasi</option>
                            <option value="Dikerjakan">Sedang Dikerjakan</option>
                            <option value="Selesai">Selesai (Siap Diambil)</option>
                        </select>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold small mb-2">Ganti Suku Cadang / Sparepart</label>
                            <select name="sparepart_id" id="select-sparepart" class="form-select">
                                <option value="">-- Tidak ada penggantian part --</option>
                                @foreach($spareparts as $part)
                                    <option value="{{ $part->id }}">{{ $part->nama_part }} (Stok: {{ $part->stok }} | Rp {{ number_format($part->harga, 0, ',', '.') }})</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold py-2"><i class="fa-solid fa-floppy-disk me-1"></i> Simpan & Perbarui Sistem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function pilihKendaraan(id, plat, nama, status, sparepart_id) {
        document.getElementById('form-placeholder').classLogic = document.getElementById('form-placeholder').classList.add('d-none');
        document.getElementById('form-asli').classList.remove('d-none');
        
        document.getElementById('txt-plat').innerText = plat;
        document.getElementById('txt-nama').innerText = "Pemilik: " + nama;
        
        document.getElementById('select-status').value = status;
        
        // Otomatis memilih sparepart yang sebelumnya sudah disimpan (jika ada)
        document.getElementById('select-sparepart').value = sparepart_id ? sparepart_id : "";
        
        document.getElementById('form-update-servis').action = "/admin/input-servis/" + id;
    }
</script>
</body>
</html>