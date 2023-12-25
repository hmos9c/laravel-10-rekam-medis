<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
       return view('auth.register', [
        'title' => 'Daftar Akun'
       ]); 
    }

    public function store(Request $request)
    {
      $validator = $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users',
         'password' => 'required|min:8'
     ]);
       $validator['remember_token'] = Str::random(10);
       $validator['email_verified_at'] = now();
       User::create($validator);
       return redirect('/login')->with('message', 'Daftar akun berhasil! silahkan login.');
    }
}
