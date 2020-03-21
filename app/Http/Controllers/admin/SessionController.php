<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Driver;

class SessionController extends Controller
{

    public function loginPage() {

        return view('admin.login');

    }

    public function login(Request $request) {

        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data)) {

            return redirect(url('admin'));

        }else {

            session()->flash('wrong', 'عفواً قم بمراجعة بيانات تسجيل الدخول الخاصة بك');
            return redirect()->back();

        }

    }

    public function logout() {

        Auth::logout();

        return redirect(url('admin'));

    }

}
