<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFController extends Controller
{
    public function generatePDF()
    {
        $data =[
            'title'=>'test dompdf',
            'date'=>date('m/d/Y')
        ];
        $pdf = Pdf::loadView('pdf.generate', $data);
        return $pdf->download('invoice.pdf');
    }
}
