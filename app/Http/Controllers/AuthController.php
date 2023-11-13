<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    function authenticate(Request $request)
    {
        // dd($request->all());
        $credentials = Validator::make($request->all(), [
            'email'  => 'required|email',
            'password'  => 'required',
        ]);

        if ($credentials->fails()) {
            // dd($request->all());
            return back()->with('warning', $credentials->messages()->first());
        }

        // unset($credentials->valid()['_token']);
        $check = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($credentials->valid());
        if (Auth::attempt($check)) {

            $user = User::where('email', $check['email'])->first();
            if ($user->level == 'admin') {

            return redirect()->route('tabadmin')->with('success', 'Anda berhasil login');
            } // halaman user
            return redirect()->route('tabadmin')->with('success', 'Anda berhasil login');
        }
        return redirect()->route('auth.login')->with('error', 'Email atau password anda salah');
    }

    function register()
    {
        return view('auth.register');
    }

    function createRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $request['level'] = 'user';
        $request['password'] = bcrypt($request['password']);

        User::create($request->all());

        return redirect()->route('register')->with('success', 'Berhasil membuat akun!');
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Berhasil logout');
    }
}
