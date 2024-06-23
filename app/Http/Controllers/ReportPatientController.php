<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class ReportPatientController extends Controller
{
    public function index()
    {
        return view('reportpatient.index', [
            'title' => 'Laporan',
            'records' => Record::latest('patient_id')->filter(request(['search', 'fromdate', 'untildate']))->paginate(10)->withQueryString()
        ]);
    }
}
