<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Record;
use App\Models\Religion;
use App\Models\Status;
use App\Models\Schedule;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'title' => 'RS Cijantung',
            'schedules' => Schedule::latest('day_id')->paginate(10),
            'patients' => Patient::all(),
            'doctors' => Doctor::all(),
            'records' => Record::all(),
            'employees' => Employee::all(),

        ]);
    }

    public function create()
    {
        return view('frontend.create', [
            'title' => 'Daftar Pasien | RS Cijantung',
            'genders' => Gender::all(),
            'religions' => Religion::all(),
            'statuses' => Status::all(),
            'nationalities' => Nationality::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'id_patient' => 'required|min:16|max:20|unique:patients',
            'gender_id' => 'required',
            'religion_id' => 'required',
            'status_id' => 'required',
            'nationality_id' => 'required',
            'name' => 'required',
            'city' => 'required',
            'dateofbirth' => 'required',
            'address' => 'required',
            'job' => 'nullable',
            'phonenumber' => 'required|min:12|max:12',
            'email' => 'nullable|email|unique:patients',
            'image' => 'image|file|max:1024'
        ]);
        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('patient-image');
        }
        Patient::create($validator);
        return redirect('/')->with('message', 'Pasien telah didaftarkan.');
    }
}
