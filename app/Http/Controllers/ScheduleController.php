<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Day;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('schedule.index',  [
            'title' => 'Jadwal Dokter',
            'schedules' => Schedule::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('schedule.create', [
            'title' => 'Tambah Jadwal Dokter',
            'doctors' => Doctor::all(),
            'days' => Day::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'doctor_id' => 'required|min:10|max:20|exists:doctors,id',
            'day_id' => 'required',
            'time' => 'required|max:20',
        ]);
        Schedule::create($validator);
        return redirect('/schedule')->with('message', 'Jadwal dokter telah ditambahkan.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return  view('schedule.show', [
            'title' => 'Detail Jadwal Dokter',
            'schedule' => $schedule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('schedule.edit', [
            'title' => 'Ubah Jadwal Dokter',
            'schedule' => $schedule,
            'doctors' => Doctor::all(),
            'days' => Day::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validator = $request->validate([
            'doctor_id' => 'required|min:10|max:20|exists:doctors,id',
            'day_id' => 'required',
            'time' => 'required|max:20',
        ]);
        Schedule::where('id', $schedule->id)->update($validator);
        return redirect('/schedule')->with('message', 'Jadwal dokter telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);
        return redirect('/schedule')->with('message', 'Jadwal dokter telah dihapus.');
    }
}
