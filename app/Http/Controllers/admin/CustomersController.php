<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{

    public function index() {

        $customers = Customer::all();

        return view('admin.customers.index', compact(['customers']));

    }

    public function delete(Customer $customer) {

        $customer->delete();

        return redirect()->back()->with('deleted', 'تم حذف العميل بنجاح');

    }

}
