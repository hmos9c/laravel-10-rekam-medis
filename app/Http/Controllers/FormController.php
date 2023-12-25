<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form.index', [
            'title' => 'Bentuk Obat',
            'forms' => Form::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.create', [
            'title' => 'Tambah Bentuk Obat',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        Form::create($validator);
        return redirect('/form')->with('message', 'Bentuk obat telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        return view('form.show', [
            'title' => 'Detail Bentuk Obat',
            'form' => $form
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        return view('form.edit', [
            'title' => 'Ubah Bentuk Obat',
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        Form::where('id', $form->id)->update($validator);
        return redirect('/form')->with('message', 'Bentuk obat telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        try {
            Form::destroy($form->id);
        } catch (\Throwable $th) {
            return redirect('/form')->with('error', 'Betuk obat sedang digunakan ditabel obat, tidak dapat menghapus bentuk obat!');
        }
        return redirect('/form')->with('message', 'Bentuk obat telah dihapus.');
    }
}
