<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function index()
    {
        // Ambil semua data sparepart dari database
        $spareparts = Sparepart::all();
        return view('admin.sparepart', compact('spareparts'));
    }

    public function store(Request $request)
    {
        // Simpan barang baru
        Sparepart::create($request->all());
        return redirect()->back()->with('success', 'Suku cadang berhasil ditambahkan!');
    }

    public function destroy(string $id)
    {
        // Hapus barang
        Sparepart::find($id)->delete();
        return redirect()->back()->with('success', 'Suku cadang berhasil dihapus!');
    }
}