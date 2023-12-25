<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('room.index', [
            'title' => 'Ruangan',
            'rooms' => Room::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.create', [
            'title' => 'Tambah Ruangan',
            'buildings' => Building::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required|min:4|max:4|unique:rooms',
            'building_id' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);
        Room::create($validator);
        return redirect('/room')->with('message', 'Ruangan telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('room.show', [
            'title' => 'Detail Ruangan',
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('room.edit', [
            'title' => 'Ubah Ruangan',
            'room' => $room,
            'buildings' => Building::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $rules = [
            'building_id' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ];
        if($request->id != $room->id){
            $rules['id'] = 'required|min:4|max:4|unique:rooms';
        }
        $validator = $request->validate($rules);
        try {
            Room::where('id', $room->id)->update($validator);
        } catch (\Throwable $th) {
            return redirect('/room')->with('error', 'Ruangan sedang digunakan ditabel tempat tidur, tidak dapat mengubah ruangan!');
        }        
        return redirect('/room')->with('message', 'Ruangan telah diubah.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        try {
            Room::destroy($room->id);
        } catch (\Throwable $th) {
            return redirect('/room')->with('error', 'Ruangan sedang digunakan ditabel tempat tidur, tidak dapat menghapus ruangan!');
        }
        return redirect('/room')->with('message', 'Ruangan telah dihapus.');
    }
}
