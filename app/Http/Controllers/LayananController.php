<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Exports\LayananExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
//func export excel-------------------------------------------------
    public function exportExcel()
    {
        return Excel::download(new LayananExport, 'datalayanan.xlsx');
    }

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


//func edit buat menampilkan form edit datanya----------------------------
    public function edit(string $id) 
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanan.edit', compact('layanan'));
    }


//func update buat nyimpen perubahan datanya---------------------------
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $layanan = Layanan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($layanan->icon && Storage::disk('public')->exists($layanan->icon)) {
                Storage::disk('public')->delete($layanan->icon);
            }
            $validated['icon'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($validated);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }


//func destroy buat hapus datanya--------------------------------------
    public function destroy(string $id)  
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
