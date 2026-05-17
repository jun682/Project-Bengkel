<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok - BengkelKita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📦 Manajemen Stok Suku Cadang</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success fw-bold">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="fa-solid fa-plus"></i> Tambah Barang Baru
                </div>
                <div class="card-body">
                    <form action="{{ route('sparepart.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Suku Cadang</label>
                            <input type="text" name="nama_part" class="form-control" placeholder="Cth: Oli MPX 2" required>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Stok</label>
                            <input type="number" name="stok" class="form-control" placeholder="Cth: 15" required>
                        </div>
                        <div class="mb-3">
                            <label>Harga Jual (Rp)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Cth: 55000" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 fw-bold">Simpan Barang</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="fa-solid fa-box"></i> Daftar Suku Cadang
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-3">Nama Part</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($spareparts as $item)
                            <tr>
                                <td class="px-3 fw-bold">{{ $item->nama_part }}</td>
                                <td>
                                    <span class="badge {{ $item->stok < 5 ? 'bg-danger' : 'bg-success' }}">
                                        {{ $item->stok }} Pcs
                                    </span>
                                </td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('sparepart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada data suku cadang.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>