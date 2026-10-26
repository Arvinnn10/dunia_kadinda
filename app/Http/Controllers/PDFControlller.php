<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFControlller extends Controller
{
    public function generatepdf(){
        $layanan = Layanan::all();

        $pdf = Pdf::loadView('pdfdatalayanan', compact('layanan'));
        
        return $pdf->download('datalayanan.pdf');
    }
}
