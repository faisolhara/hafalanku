<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profilku()
    {
        return view('profil.profilku', [
            'model' => \Auth::user(),
        ]);
    }

    public function simpanProfilku(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
        ]);

        $user = \Auth::user();
        $user->name = $request->get('nama');
        $user->email = $request->get('email');

        if ($request->file('photo') !== null && $request->file('photo')->isValid()) {
            $random = rand(100, 999);
            $md5 = md5((new \DateTime())->format('YmdHis'));
            $fileName = $md5 . $random . '.' . $request->photo->extension();

            $user->photo = $fileName;
            $request->photo->move(public_path('images/users'), $fileName);
        }

        $user->save();

        \Session::flash(
            'successMessage',
            'Profil berhasil diperbaharui'
        );

        return redirect('/beranda');
    }

    public function gantiPassword()
    {
        return view('profil.ganti-password');
    }

    public function simpanGantiPassword(Request $request)
    {
        \Validator::extend('correct_password', function($attribute, $value) {
            $user = \Auth::user();
            return \Hash::check($value, $user->password);
        });

        $validator = \Validator::make($request->all(), [
            'passwordLama' => 'required|correct_password',
            'passwordBaru' => 'required|min:6',
            'konfirmasiPasswordBaru' => 'required|min:6|same:passwordBaru',
        ], [
            'passwordLama.required' => 'Password Lama harus diisi',
            'passwordLama.correct_password' => 'Password Lama anda salah',
            'passwordBaru.required' => 'Password Baru harus diisi',
            'passwordBaru.min' => 'Password Baru minimum :min Karakter',
            'konfirmasiPasswordBaru.required' => 'Konfirmasi Password Baru harus diisi',
            'konfirmasiPasswordBaru.min' => 'Konfirmasi Password Baru minimum :min Karakter',
            'konfirmasiPasswordBaru.same' => 'Konfirmasi Password Baru dan Password Baru harus sama',
        ]);

        if ($validator->fails()) {
            return redirect(\URL::previous())->withInput()->withErrors($validator);
        }

        $user->password = bcrypt($request->get('passwordBaru'));
        $user->save();

        \Session::flash(
            'successMessage',
            'Password berhasil dirubah'
        );

        return redirect('/beranda');
    }
}
