<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Driver;

class HomeController extends Controller
{

    public function index() {

        if(Auth::check()) {

            $drivers = Driver::where('status', 0)->paginate();

            return view('admin.index', compact(['drivers']));

        }else {

            return view('admin.login');

        }

    }

}
