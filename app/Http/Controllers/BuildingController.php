<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('building.index', [
            'title' => 'Gedung',
            'buildings' => Building::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('building.create', [
            'title' => 'Tambah Gedung',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required|min:2|max:2|unique:buildings',
            'name' => 'required',
            'description' => 'nullable'
        ]);
        Building::create($validator);
        return redirect('/building')->with('message', 'Gedung telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return view('building.show', [
            'title' => 'Detail Gedung',
            'building' => $building
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        return view('building.edit', [
            'title' => 'Ubah Gedung',
            'building' => $building
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building)
    {
        $rules = [
            'name' => 'required',
            'description' => 'nullable'
        ];
        if($request->id != $building->id){
            $rules['id'] = 'required|min:2|max:2|unique:buildings';
        }
        $validator = $request->validate($rules);
        try {
            Building::where('id', $building->id)->update($validator);
        } catch (\Throwable $th) {
            return redirect('/building')->with('error', 'Gedung sedang digunakan ditabel ruangan, tidak dapat mengubah gedung!');
        }
        return redirect('/building')->with('message', 'Gedung telah diubah.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        try {
            Building::destroy($building->id);
        } catch (\Throwable $th) {
            return redirect('/building')->with('error', 'Gedung sedang digunakan ditabel ruangan, tidak dapat menghapus gedung!');
        }
        return redirect('/building')->with('message', 'Gedung telah dihapus.');
    }
}
