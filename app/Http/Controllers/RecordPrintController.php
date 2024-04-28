<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordPrintController extends Controller
{
    public function index()
    {
        return view('print.recordprint', [
            'title' => 'Print Semua Jadwal Dokter',
            'records' => Record::all()
        ]);

    }

    public function show(Record $record)
    {
        return view('print.recordshowprint', [
            'title' => 'Print Jadwal Dokter',
            'record' => $record
        ]);
    }
}
