<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function login(Request $request){

        $customer = Customer::where('phone', $request->phone)->first();

        if($customer){

            $data['customer'] = $customer;
            $data['token'] =  $customer->createToken($customer->name)->accessToken;
            return response()->json(['data' => $data, 'status' => 1]);

        } else {

            return response()->json(['message' => 'عفواً انت غير مسجل', 'status' => 0]);

        }

    }

    public function register(Request $request) {

        $messages = [
            'name.required' => 'عفوا قم بإدخال الاسم',
            'phone.required' => 'عفوا قم بإدخال رقم الهاتف',
            'phone.unique' => 'عفوا تم التسجيل من قبل برقم الهاتف الذي ادخلته',
        ];

        $this->validate($request, [
           'name' => 'required',
           'phone' => 'required|unique:customers'
        ], $messages);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->save();

        $data['customer'] = $customer;
        $data['token'] =  $customer->createToken($customer->name)->accessToken;

        return response()->json(['data' => $data, 'status' => 1]);

    }

    public function update(Request $request) {

        $customer = Auth::guard('customer')->user();

        $messages = [
            'name.required' => 'عفوا قم بإدخال الاسم',
            'phone.required' => 'عفوا قم بإدخال رقم الهاتف',
        ];

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ], $messages);

        if($customer->phone != $request->phone){
            $this->validate($request, ['phone' => 'unique:customers']);
        }
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->save();

        $data['customer'] = $customer;

        return response()->json(['message' => 'تم تعديل بياناتك بنجاح بنجاح', 'data' => $data, 'status' => 1]);

    }

    public function logout(Request $request) {

        $request->user()->token()->delete();

        return response()->json(['status' => 1]);

    }

}
