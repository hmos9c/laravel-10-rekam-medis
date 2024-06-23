<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($doctor)
    {
        return view('document.create', [
            'title' => 'Tambah Dokumen',
            'doctor' => $doctor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'doctor_id' => 'required',
            'name' => 'required|max:50',
            'document' => 'required|mimes:doc,docx,pdf,xlx,xlsx,ppt,pptx|file|max:5024'
        ]);
        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('doctor-image');
        }
        if($request->file('document')){
            $validator['document'] = $request->file('document')->store('doctor-document');
        }
        Document::create($validator);
        return redirect('/doctor')->with('message', 'Dokumen dokter telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        try {
            if($document->document){
                Storage::delete($document->document);
            }
            Document::destroy($document->id_document);
        } catch (\Throwable $th) {
            return redirect('/doctor')->with('error', 'Dokumen sedang digunakan ditabel lain, tidak dapat menghapus dokumen!');
        }
        return redirect('/doctor')->with('message', 'Dokumen telah dihapus.');
    }
}
