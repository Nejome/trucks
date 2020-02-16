<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    public function index() {

        $user = Auth::user();
        $setting = Setting::find(1);

        return view('admin.settings.index', compact(['user', 'setting']));

    }

    public function update(Request $request) {

        $this->validate($request, [
           'name' => 'required',
           'commission_rate' => 'required|numeric'
        ]);

        $user = Auth::user();
        $setting = Setting::find(1);

        $user->name = $request->name;
        $user->save();

        $setting->commission_rate = $request->commission_rate;
        $setting->save();

        session()->flash('settings_updated', 'تم تعديل بيانات الموقع بنجاح');
        return redirect()->back();

    }

    public function change_password(Request $request) {

        $user = Auth::user();

        $messages = [
            'old_password.required' => 'عفوا قم بإدخال كلمة المرور القديمة',
            'password.required' => 'عفوا قم بإدخال كلمة المرور الجديدة',
            'password.confirmed' => 'كلمة المرور وتأكيد كلمة المرور غير متطابقين',
            'password_confirmation.required' => 'عفوا قم بإدخال تأكيد كلمة المرور'
        ];

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ], $messages);

        if(Hash::check($request->old_password, $user->password)){

            $user->password = Hash::make($request->password);
            $user->save();


            session()->flash('change_success', 'تم تعديل كلمة المرور الخاصة بنجاح');
            return redirect()->back();

        }else {

            session()->flash('wrong_password', 'عفوا كلمة القديمة التي ادخلتها غير صحيحة');
            return redirect()->back();

        }

    }

}
