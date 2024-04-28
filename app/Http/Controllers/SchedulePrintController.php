<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class SchedulePrintController extends Controller
{
    public function index()
    {
        return view('print.scheduleprint', [
            'title' => 'Print Semua Jadwal Dokter',
            'schedules' => Schedule::all()
        ]);

    }

    public function show(Schedule $schedule)
    {
        return view('print.scheduleshowprint', [
            'title' => 'Print Jadwal Dokter',
            'schedule' => $schedule
        ]);
    }
}
