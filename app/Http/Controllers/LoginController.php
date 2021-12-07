<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('home.master');
        } else {
            Session::flash('errorLogin', 'Tài khoản hoặc mật khẩu không chính xác');
            return redirect()->route('ShowFormLogin');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('ShowFormLogin');
    }

    public function showFormPassword()
    {
        return view('changeLogin');
    }


    public function changePassword(Request $request)
    {
        $user = Auth::User();

        $userPassword = $user->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password' => 'mật khẩu không đúng ']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success', 'Mật khẩu được cập nhật');
    }
}
