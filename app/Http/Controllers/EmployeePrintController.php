<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeePrintController extends Controller
{
    public function index()
    {
        return view('print.employeeprint', [
            'title' => 'Print Semua Pegawai',
            'employees' => Employee::all()
        ]);

    }

    public function show(Employee $employee)
    {
        return view('print.employeeshowprint', [
            'title' => 'Print Pegawai',
            'employee' => $employee
        ]);
    }
}
