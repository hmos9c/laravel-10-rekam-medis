<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Drug;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Record;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Dasbor',
            'employees' => Employee::all(),
            'doctors' => Doctor::all(),
            'patients' => Patient::all(),
            'drugs' => Drug::all(),
            'beds' => Bed::all(),
            'records' => Record::all(),
        ]);
    }
}
