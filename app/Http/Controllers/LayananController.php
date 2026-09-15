<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['icon'] = $request->file('gambar')->store('layanan', 'public');
        }

        Layanan::create($validated);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }
}
