<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'title' => 'Pengguna',
            'users' => User::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'title' => 'Tambah Pengguna'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|min:8',
            'role' => 'required',
            'image' => 'nullable|image|file|max:1024'
        ]);
        $validator['remember_token'] = Str::random(10);
        $validator['email_verified_at'] = now();
        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('user-image');
        }
        User::create($validator);
        return redirect('/user')->with('message', 'Pengguna telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', [
            "title" => "Detail Pengguna",
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'title' => 'Ubah Pengguna',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:20',
            'password' => 'required|min:8',
            'role' => 'required',
            'image' => 'nullable|image|file|max:1024',
        ];
        if($request->email != $user->email){
            $rules['email'] = 'required|email|unique:users';
        }
        $validator = $request->validate($rules);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validator['image'] = $request->file('image')->store('user-image');
        }
        User::where('id', $user->id)->update($validator);
        if ($request->password != $user->password) {
            User::whereId($user->id)->update([
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect('/user')->with('message', 'Pengguna telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user == Auth::user()){
            return redirect('/user')->with('userLogin', 'Pengguna sedang login, tidak dapat menghapus pengguna!');
        }else{
            if($user->image){
                Storage::delete($user->image);
            }
            user::destroy($user->id);
            return redirect('/user')->with('message', 'Pengguna telah dihapus.');
        }
    }
}
