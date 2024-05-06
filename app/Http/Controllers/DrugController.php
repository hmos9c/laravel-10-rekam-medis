<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('drug.index',  [
            'title' => 'Obat',
            'drugs' => Drug::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drug.create', [
            'title' => 'Tambah Obat'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id_drug' => 'required|min:15|max:20|unique:drugs',
            'type' => 'required|max:15',
            'form' => 'required|max:10',
            'name' => 'required|max:20',
            'description' => 'nullable',
            'stock' => 'nullable|max:4',
            'expired' => 'required',
            'image' => 'nullable|image|file|max:1024'
        ]);
        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('drug-image');
        }
        Drug::create($validator);
        return redirect('/drug')->with('message', 'Obat telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Drug $drug)
    {
        return view('drug.show', [
            'title' => 'Detail Obat',
            'drug' => $drug
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drug $drug)
    {
        return view('drug.edit', [
            'title' => 'Ubah Obat',
            'drug' => $drug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drug $drug)
    {
        $rules = [
            'type' => 'required|max:15',
            'form' => 'required|max:10',
            'name' => 'required|max:20',
            'description' => 'nullable',
            'stock' => 'nullable|max:4',
            'expired' => 'required',
            'image' => 'nullable|image|file|max:1024'
        ];
        if($request->id_drug != $drug->id_drug){
            $rules['id_drug'] = 'required|min:15|max:20|unique:drugs';
        }
        $validator = $request->validate($rules);
        try {
            if($request->file('image')){
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
                $validator['image'] = $request->file('image')->store('drug-image');
            }
            Drug::where('id_drug', $drug->id_drug)->update($validator);
        } catch (\Throwable $th) {
            return redirect('/drug')->with('error', 'Obat sedang digunakan ditabel rekam, tidak dapat mengubah obat!');
        }
        return redirect('/drug')->with('message', 'Obat telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drug $drug)
    {
        try {
            if($drug->image){
                Storage::delete($drug->image);
            }
            Drug::destroy($drug->id_drug);
        } catch (\Throwable $th) {
            return redirect('/drug')->with('error', 'Obat sedang digunakan ditabel rekam, tidak dapat menghapus obat!');
        }
        return redirect('/drug')->with('message', 'Obat telah dihapus.');
    }
}
