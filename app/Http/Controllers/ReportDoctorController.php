<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class ReportDoctorController extends Controller
{
    public function index()
    {
        return view('reportdoctor.index', [
            'title' => 'Laporan',
            'records' => Record::latest('doctor_id')->filter(request(['search', 'fromdate', 'untildate']))->paginate(10)->withQueryString()
        ]);
    }
}
