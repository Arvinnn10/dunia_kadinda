<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
 //ini func index buat menampilkan data----------------------------------------------
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.index', compact('layanan'));
    }


//func create buat nambahin datanya---------------------------------
    public function create()  
    {
        return view('layanan.create');
    }


//func store buat nyimpen datanya---------------------------------------
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


//func show buat menampilkan detail layanannya----------------------------
    public function show(string $id) 
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanan.detaillayanan', compact('layanan'));
    }


//func destroy buat hapus datanya--------------------------------------
    public function destroy(string $id)  
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
