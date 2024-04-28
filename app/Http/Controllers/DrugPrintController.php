<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;

class DrugPrintController extends Controller
{
    public function index()
    {
        return view('print.drugprint', [
            'title' => 'Print Semua Obat',
            'drugs' => Drug::all()
        ]);

    }

    public function show(Drug $drug)
    {
        return view('print.drugshowprint', [
            'title' => 'Print Pasien',
            'drug' => $drug
        ]);
    }
}
