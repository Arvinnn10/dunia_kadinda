<?php

namespace App\Exports;

use App\Models\Layanan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LayananExport implements FromCollection, WithHeadings, WithMapping
{
    protected $no = 0;

    public function collection(): Collection
    {
        return Layanan::select('id', 'nama_layanan', 'deskripsi', 'harga', 'status')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Layanan',
            'Deskripsi',
            'Harga',
            'Status',
        ];
    }
}
