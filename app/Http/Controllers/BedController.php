<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Room;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bed.index', [
            'title' => 'Tempat Tidur',
            'beds' => Bed::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bed.create', [
            'title' => 'Tambah Tempat Tidur',
            'rooms' => Room::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required|min:6|max:6|unique:beds',
            'room_id' => 'required'
        ]);
        Bed::create($validator);
        return redirect('/bed')->with('message', 'Tempat tidur telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bed $bed)
    {
        return view('bed.show', [
            'title' => 'Detail Tempat Tidur',
            'bed' => $bed
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bed $bed)
    {
        return view('bed.edit', [
            'title' => 'Ubah Tempat Tidur',
            'bed' => $bed,
            'rooms' => Room::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bed $bed)
    {
        $rules = [
            'room_id' => 'required',
        ];
        if($request->id != $bed->id){
            $rules['id'] = 'required|min:6|max:6|unique:beds';
        }
        $validator = $request->validate($rules);
        try {
            Bed::where('id', $bed->id)->update($validator);
        } catch (\Throwable $th) {
            return redirect('/bed')->with('error', 'Tempat tidur sedang digunakan ditabel rekam, tidak dapat mengubah tempat tidur!');
        }       
        return redirect('/bed')->with('message', 'Tempat tidur telah diubah.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bed $bed)
    {
        try {
            Bed::destroy($bed->id);
        } catch (\Throwable $th) {
            return redirect('/bed')->with('error', 'Tempat tidur sedang digunakan ditabel rekam, tidak dapat menghapus tempat tidur!');
        }
        return redirect('/bed')->with('message', 'Tempat tidur telah dihapus.');
    }
}
