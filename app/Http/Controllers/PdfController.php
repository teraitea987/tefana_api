<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
	protected $fpdf;
 
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index() 
    {
    	$this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", "A4");
        $this->fpdf->Image('images/templates/template-recto-1.png', 20, 0, -160);
        $this->fpdf->Output();

        exit;
    }
}