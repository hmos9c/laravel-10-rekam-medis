<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Bed;
use App\Models\Care;
use App\Models\Doctor;
use App\Models\Drug;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('record.index',  [
            'title' => 'Rekam Pasien',
            'records' => Record::latest()->filter(request(['search', 'dateofentry', 'outdate']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('record.create', [
            'title' => 'Tambah Rekam Pasien',
            'doctors' => Doctor::all(),
            'drugs' => Drug::all(),
            'beds' => Bed::all(),
            'cares' => Care::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'patient_id' => 'required|exists:patients,id_patient',
            'doctor_id' => 'required',
            'drug_id' => 'required',
            'bed_id' => 'required',
            'care_id' => 'required',
            'diagnosis' => 'nullable',
            'allergy' => 'nullable|max:50',
            'description' => 'nullable',
            'height' => 'nullable|max:10',
            'weight' => 'nullable|max:10',
            'operation' => 'nullable',
            'blood' => 'nullable|max:2',
            'tension' => 'nullable|max:15',
            'hospital' => 'nullable|max:20',
            'dateofentry' => 'required',
            'outdate' => 'nullable',
            'drug2' => 'nullable',
            'drug3' => 'nullable',
            'drug4' => 'nullable'
        ]);
          $validator['id_record'] = fake()->unique()->numerify('##########');
          Record::create($validator);
          return redirect('/record')->with('message', 'Rekam pasien telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        return view('record.show', [
            'title' => 'Detail Rekam Pasien',
            'record' => $record
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        return view('record.edit', [
            'title' => 'Ubah Rekam Pasien',
            'record' => $record,
            'doctors' => Doctor::all(),
            'drugs' => Drug::all(),
            'beds' => Bed::all(),
            'cares' => Care::all()
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $rules = [
            'doctor_id' => 'required',
            'drug_id' => 'required',
            'bed_id' => 'required',
            'care_id' => 'required',
            'diagnosis' => 'nullable',
            'allergy' => 'nullable',
            'description' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable',
            'operation' => 'nullable',
            'blood' => 'nullable',
            'tension' => 'nullable',
            'hospital' => 'nullable',
            'dateofentry' => 'required',
            'outdate' => 'nullable',
            'drug2' => 'nullable',
            'drug3' => 'nullable',
            'drug4' => 'nullable'
        ];
        $validator = $request->validate($rules);
        Record::where('id_record', $record->id_record)->update($validator);
        return redirect('/record')->with('message', 'Rekam pasien telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        Record::destroy($record->id_record);
        return redirect('/record')->with('message', 'Rekam pasien telah dihapus.');
    }
}
