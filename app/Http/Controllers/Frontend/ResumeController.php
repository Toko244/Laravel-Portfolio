<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class ResumeController extends Controller
{
    public function index()
    {
        $pdf = PDF::loadView('frontend/components/resume/index');
        return $pdf->download('resume.pdf');
    }
}
