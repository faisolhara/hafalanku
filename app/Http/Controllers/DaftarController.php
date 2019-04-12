<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use App\User;

class DaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('daftar');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:password',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah dipakai oleh user lain',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimum :min Karakter',
            'confirmPassword.required' => 'Konfirmasi Password harus diisi',
            'confirmPassword.min' => 'Konfirmasi Password minimum :min Karakter',
            'confirmPassword.same' => 'Password dan Konfirmasi Password harus sama',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        \Auth::guard()->login($user);

        \Session::flash(
            'successMessage',
            'User ' . $user->name . ' berhasil terdaftar'
        );

        return redirect('/beranda');
    }
}
