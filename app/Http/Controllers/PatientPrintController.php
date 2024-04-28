<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientPrintController extends Controller
{
    public function index()
    {
        return view('print.patientprint', [
            'title' => 'Print Semua Pasien',
            'patients' => Patient::all()
        ]);

    }

    public function show(Patient $patient)
    {
        return view('print.patientshowprint', [
            'title' => 'Print Pasien',
            'patient' => $patient
        ]);
    }
}
