<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Document;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doctor.index', [
            'title' => 'Dokter',
            'doctors' => Doctor::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctor.create', [
            'title' => 'Tambah Dokter',
            'genders' => Gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id_doctor' => 'required|min:10|max:19|unique:doctors',
            'gender_id' => 'required',
            'name' => 'required|max:20',
            'specialist' => 'nullable|max:20',
            'phonenumber' => 'required|min:10|max:12',
            'accepted' => 'required',
            'address' => 'required|max:50',
            'image' => 'nullable|image|file|max:1024'
        ]);
        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('doctor-image');
        }
        Doctor::create($validator);
        return redirect('/doctor')->with('message', 'Dokter telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('doctor.show', [
            'title' => 'Detail Dokter',
            'doctor' => $doctor,
            'documents' => Document::where('doctor_id', $doctor->id_doctor)->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctor.edit', [
            'title' => 'Ubah Dokter',
            'doctor' => $doctor,
            'genders' => Gender::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $rules = [
            'gender_id' => 'required',
            'name' => 'required|max:20',
            'specialist' => 'nullable|max:20',
            'phonenumber' => 'required|min:10|max:12',
            'accepted' => 'required',
            'address' => 'nullable|max:50',
            'image' => 'nullable|image|file|max:1024'
        ];
        if($request->id_doctor != $doctor->id_doctor){
            $rules['id_doctor'] = 'required|min:10|max:19|unique:doctors';
        }
        $validator = $request->validate($rules);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validator['image'] = $request->file('image')->store('doctor-image');
        }
        try {
            Doctor::where('id_doctor', $doctor->id_doctor)->update($validator);
        } catch (\Throwable $th) {
            return redirect('/doctor')->with('error', 'Dokter sedang digunakan ditabel lain, tidak dapat mengubah dokter!');
        }  
        return redirect('/doctor')->with('message', 'Dokter telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        try {
            if($doctor->image){
                Storage::delete($doctor->image);
            }
            Doctor::destroy($doctor->id_doctor);
        } catch (\Throwable $th) {
            return redirect('/doctor')->with('error', 'Dokter sedang digunakan ditabel lain, tidak dapat menghapus dokter!');
        }
        return redirect('/doctor')->with('message', 'Dokter telah dihapus.');
    }
}
