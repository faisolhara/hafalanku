<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use App\Entities\User;

class MasukController extends Controller
{
    public function index()
    {
        return view('masuk');
    }

    public function post(Request $request)
    {
        if (!\Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {
            return redirect('/masuk')->withInput()->withErrors(['errorMessage' => 'Email atau password anda salah!']);
        }

        if(!empty($request->get('timezoneOffset'))) {
            \Session::put('timezoneOffset', $request->get('timezoneOffset'));
        } else {
            \Session::forget('timezoneOffset');
        }

        return redirect('/beranda');
    }

    public function keluar()
    {
        \Auth::logout();
        return redirect('/');
    }
}
