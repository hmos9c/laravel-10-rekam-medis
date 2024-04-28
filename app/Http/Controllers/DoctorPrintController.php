<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorPrintController extends Controller
{
    public function index()
    {
        return view('print.doctorprint', [
            'title' => 'Print Semua Dokter',
            'doctors' => Doctor::all()
        ]);

    }

    public function show(Doctor $doctor)
    {
        return view('print.doctorshowprint', [
            'title' => 'Print Dokter',
            'doctor' => $doctor
        ]);
    }
}
