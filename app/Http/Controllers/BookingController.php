<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_wa' => 'required',
            'plat_nomor' => 'required',
            'jadwal_servis' => 'required|date',
            'keluhan' => 'required'
        ]);

        $kode_booking = 'BKL-' . strtoupper(Str::random(5));
        
        Booking::create(array_merge($request->all(), ['kode_booking' => $kode_booking]));

        return redirect()->back()->with('success', 'Booking Berhasil! Kode Anda: ' . $kode_booking);
    }

    public function cekStatus(Request $request)
    {
        $booking = null;
        if($request->has('kode_booking')) {
            $booking = Booking::where('kode_booking', $request->kode_booking)->first();
        }
        return view('welcome', compact('booking'));
    }
    public function laporan()
    {
        // Mengambil semua data pesanan untuk laporan
        $bookings = Booking::latest()->get();
        
        // Menghitung total perkiraan (nanti bisa disesuaikan dengan tabel transaksi asli)
        $totalPesanan = $bookings->count();
        
        return view('admin.laporan', compact('bookings', 'totalPesanan'));
    }
}