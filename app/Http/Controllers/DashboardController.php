<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Drug;
use App\Models\Doctor;
use App\Models\Record;
use App\Models\Patient;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;

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
            'jan' => Record::whereMonth('dateofentry', '=', date('1'))->get(),
            'feb' => Record::whereMonth('dateofentry', '=', date('2'))->get(),
            'mar' => Record::whereMonth('dateofentry', '=', date('3'))->get(),
            'apr' => Record::whereMonth('dateofentry', '=', date('4'))->get(),
            'may' => Record::whereMonth('dateofentry', '=', date('5'))->get(),
            'jun' => Record::whereMonth('dateofentry', '=', date('6'))->get(),
            'jul' => Record::whereMonth('dateofentry', '=', date('7'))->get(),
            'aug' => Record::whereMonth('dateofentry', '=', date('8'))->get(),
            'sep' => Record::whereMonth('dateofentry', '=', date('9'))->get(),
            'oct' => Record::whereMonth('dateofentry', '=', date('10'))->get(),
            'nov' => Record::whereMonth('dateofentry', '=', date('11'))->get(),
            'dec' => Record::whereMonth('dateofentry', '=', date('12'))->get(),
            'rawatinap' => Record::where('care_id', '1')->get(),
            'rawatjalan' => Record::where('care_id', '2')->get(),
        ]);
    }
}
