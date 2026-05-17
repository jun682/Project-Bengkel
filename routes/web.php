<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SparepartController;

// Memanggil rute login/register bawaan Laravel
Auth::routes();

// Halaman Landing Page
Route::get('/', [BookingController::class, 'index'])->name('beranda');

// AREA CUSTOMER (Harus Login Dulu)
Route::middleware(['auth'])->group(function () {
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/cek-status', [BookingController::class, 'cekStatus'])->name('cek.status');
});

// AREA ADMIN (Harus Login & Role-nya 'admin')
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // 1. Rute Dashboard (Dengan Kalkulasi Pendapatan Nyata)
    Route::get('/dashboard', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini!');
        }
        
        $hariIni = \Carbon\Carbon::today();
        $bookingHariIni = App\Models\Booking::whereDate('created_at', $hariIni)->count();
        $sedangDikerjakan = App\Models\Booking::where('status', 'Dikerjakan')->count();
        $stokKritis = App\Models\Sparepart::where('stok', '<', 5)->count(); 
        
        // HITUNG PENDAPATAN ASLI
        $allBookings = App\Models\Booking::with('sparepart')->latest()->get();
        $pendapatanHariIni = 0;
        foreach ($allBookings as $b) {
            // Hanya hitung kendaraan yang Selesai dan memakai sparepart
            if ($b->status == 'Selesai' && $b->sparepart) {
                $pendapatanHariIni += $b->sparepart->harga;
            }
        }
        
        $bookings = $allBookings;
        
        return view('admin.dashboard', compact(
            'bookings', 'bookingHariIni', 'sedangDikerjakan', 'pendapatanHariIni', 'stokKritis'
        ));
    })->name('admin.dashboard');

    // 2. Rute Manajemen Sparepart
    Route::get('/sparepart', [SparepartController::class, 'index'])->name('sparepart.index');
    Route::post('/sparepart', [SparepartController::class, 'store'])->name('sparepart.store');
    Route::delete('/sparepart/{id}', [SparepartController::class, 'destroy'])->name('sparepart.destroy');

    // 3. Rute Cetak Laporan
    Route::get('/laporan', [BookingController::class, 'laporan'])->name('laporan.index');

    // 4. Rute Booking Manual
    Route::get('/booking-manual', function () {
        return view('admin.booking_manual');
    })->name('admin.booking_manual');

    // 5. RUTE INPUT SERVIS
    Route::get('/input-servis', function () {
        // Ambil data yang statusnya belum selesai
        $bookings = App\Models\Booking::where('status', '!=', 'Selesai')->get();
        $spareparts = App\Models\Sparepart::all();
        
        return view('admin.input_servis', compact('bookings', 'spareparts'));
    })->name('admin.input_servis');

    Route::post('/input-servis/{id}', function (Request $request, $id) {
        $booking = App\Models\Booking::findOrFail($id);
        
        // --- FITUR PENERJEMAH OTOMATIS STATUS ---
        $kataDariBrowser = $request->status;
        
        // Mencegat kata yang salah dan mengubahnya sesuai database ('Menunggu')
        if ($kataDariBrowser == 'Pending' || $kataDariBrowser == 'Menunggu Konfirmasi') {
            $booking->status = 'Menunggu';
        } else {
            // Jika kata sudah benar (Dikerjakan / Selesai), langsung masukkan
            $booking->status = $kataDariBrowser;
        }

        // --- Logika Pintar Pengaman Stok Suku Cadang ---
        $partBaruId = $request->sparepart_id;
        
        // Cek apakah mekanik mengganti pilihan sparepart
        if ($booking->sparepart_id != $partBaruId) {
            
            // 1. Kembalikan stok part yang lama (jika sebelumnya sudah pernah pilih)
            if ($booking->sparepart_id) {
                $oldPart = App\Models\Sparepart::find($booking->sparepart_id);
                if ($oldPart) {
                    $oldPart->increment('stok'); 
                }
            }
            
            // 2. Potong stok part yang baru dipilih
            if ($partBaruId) {
                $newPart = App\Models\Sparepart::find($partBaruId);
                if ($newPart && $newPart->stok >= 1) {
                    $newPart->decrement('stok');
                }
            }
            
            // 3. Update ID sparepart di data pesanan
            $booking->sparepart_id = $partBaruId;
        }

        $booking->save();
        return redirect()->route('admin.dashboard')->with('success', 'Status servis berhasil diperbarui!');
    })->name('admin.input_servis.update');

    // 6. Rute Pengaturan
    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('admin.pengaturan');

});

// PENUNJUK JALAN SETELAH LOGIN
Route::get('/home', function () {
    if (Auth::check() && Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard'); 
    }
    return redirect('/'); 
});