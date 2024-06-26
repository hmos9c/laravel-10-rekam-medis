<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Record;
use App\Models\Status;
use App\Models\Patient;
use App\Models\Religion;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('patient.index', [
            'title' => 'Pasien',
            'patients' => Patient::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create', [
            'title' => 'Tambah Pasien',
            'genders' => Gender::all(),
            'religions' => Religion::all(),
            'statuses' => Status::all(),
            'nationalities' => Nationality::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id_patient' => 'required|min:16|max:20|unique:patients',
            'gender_id' => 'required',
            'religion_id' => 'required',
            'status_id' => 'required',
            'nationality_id' => 'required',
            'name' => 'required|max:20',
            'city' => 'required|max:15',
            'dateofbirth' => 'required',
            'address' => 'required|max:50',
            'job' => 'nullable|max:20',
            'outdate' => 'nullable',
            'phonenumber' => 'required|min:12|max:12',
            'email' => 'nullable|email|max:100|unique:patients',
            'image' => 'image|file|max:1024'
        ]);
        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('patient-image');
        }
        Patient::create($validator);
        return redirect('/patient')->with('message', 'Pasien telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patient.show', [
            'title' => 'Detail Pegawai',
            'patient' => $patient,
            'records' => Record::where('patient_id', $patient->id_patient)->latest('dateofentry')->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit', [
            'title' => 'Ubah Pasien',
            'patient' => $patient,
            'genders' => Gender::all(),
            'religions' => Religion::all(),
            'statuses' => Status::all(),
            'nationalities' => Nationality::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $rules = [
            'gender_id' => 'required',
            'religion_id' => 'required',
            'status_id' => 'required',
            'nationality_id' => 'required',
            'name' => 'required|max:20',
            'city' => 'required|max:15',
            'dateofbirth' => 'required',
            'address' => 'required|max:50',
            'job' => 'required|max:20',
            'outdate' => 'nullable',
            'phonenumber' => 'required|min:12|max:12',
            'image' => 'nullable|image|file|max:1024'
        ];
        if($request->id_patient != $patient->id_patient){
            $rules['id_patient'] = 'required|min:16|max:20|unique:patients';
        }
        if($request->email != $patient->email){
            $rules['email'] = 'unique:patients|max:100';
        }
        $validator = $request->validate($rules);
        try {
            if($request->file('image')){
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
                $validator['image'] = $request->file('image')->store('patient-image');
            }
            Patient::where('id_patient', $patient->id_patient)->update($validator);
        } catch (\Throwable $th) {
            return redirect('/patient')->with('error', 'Pasien sedang digunakan ditabel rekam, tidak dapat mengubah pasien!');
        }   
        return redirect('/patient')->with('message', 'Pasien telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        try {
            if($patient->image){
                Storage::delete($patient->image);
            }
            Patient::destroy($patient->id_patient);
        } catch (\Throwable $th) {
            return redirect('/patient')->with('error', 'Pasien sedang digunakan ditabel rekam, tidak dapat menghapus pasien!');
        }
        return redirect('/patient')->with('message', 'Pasien telah dihapus.');
    }
}
