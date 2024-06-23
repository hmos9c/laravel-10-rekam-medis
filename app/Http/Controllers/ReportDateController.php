<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class ReportDateController extends Controller
{
    public function index()
    {
        return view('reportdate.index', [
            'title' => 'Laporan',
            'records' => Record::latest('dateofentry')->filter(request(['search', 'fromdate', 'untildate']))->paginate(10)->withQueryString()
        ]);
    }
}
