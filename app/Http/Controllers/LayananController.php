<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Menampilkan daftar layanan.
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.inputlayanan', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.inputlayanan');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data layanan ke database
        Layanan::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }
}
