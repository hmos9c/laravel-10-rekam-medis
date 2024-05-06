<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.index', [
            'title' => 'Pegawai',
            'employees' => Employee::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', [
            'title' => 'Tambah Pegawai',
            'genders' => Gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id_employee' => 'required|min:10|max:20|unique:employees',
            'gender_id' => 'required',
            'name' => 'required|max:20',
            'position' => 'nullable|max:20',
            'phonenumber' => 'required|min:12|max:12',
            'accepted' => 'required',
            'address' => 'nullable|max:50',
            'image' => 'nullable|image|file|max:1024'
        ]);
        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('employee-image');
        }
        Employee::create($validator);
        return redirect('/employee')->with('message', 'Pegawai telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', [
            'title' => 'Detail Pegawai',
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'title' => 'Ubah Pegawai',
            'employee' => $employee,
            'genders' => Gender::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'gender_id' => 'required',
            'name' => 'required|max:20',
            'position' => 'nullable|max:20',
            'phonenumber' => 'required|min:12|max:12',
            'accepted' => 'required',
            'address' => 'nullable|max:50',
            'image' => 'nullable|image|file|max:1024'
        ];
        if($request->id_employee != $employee->id_employee){
            $rules['id_employee'] = 'required|min:10|max:20|unique:employees';
        }
        $validator = $request->validate($rules);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validator['image'] = $request->file('image')->store('employee-image');
        }
        Employee::where('id_employee', $employee->id_employee)->update($validator);
        return redirect('/employee')->with('message', 'Pegawai telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if($employee->image){
            Storage::delete($employee->image);
        }
        Employee::destroy($employee->id_employee);
        return redirect('/employee')->with('message', 'Pegawai telah dihapus.');
    }
}
