<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class CertificateController extends Controller
{
    public function generatePdf(Certificate $certificate): Response
    {
        $certificate->loadMissing('user', 'course');

        $pdf = Pdf::loadView('pdf/certificate', ['certificate' => $certificate]);

        return $pdf->stream();
    }
}
