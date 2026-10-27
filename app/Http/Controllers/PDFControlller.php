<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFControlller extends Controller
{
    public function generatepdf(){
        $layanan = Layanan::all();

        $pdf = Pdf::loadView('layanan.pdfdatalayanan', ['layanan' => $layanan]);
        
        return $pdf->download('datalayanan.pdf');
    }
}
