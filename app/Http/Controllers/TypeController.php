<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('type.index', [
            'title' => 'Jenis Obat',
            'types' => Type::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create', [
            'title' => 'Tambah Jenis Obat',
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
        Type::create($validator);
        return redirect('/type')->with('message', 'Jenis obat telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('type.show', [
            'title' => 'Detail Jenis Obat',
            'type' => $type
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('type.edit', [
            'title' => 'Ubah Jenis Obat',
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        Type::where('id', $type->id)->update($validator);
        return redirect('/type')->with('message', 'Jenis obat telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try {
            Type::destroy($type->id);
        } catch (\Throwable $th) {
            return redirect('/type')->with('error', 'Jenis obat sedang digunakan ditabel obat, tidak dapat menghapus jenis obat!');
        }
        return redirect('/type')->with('message', 'Jenis obat telah dihapus.');
    }
}
