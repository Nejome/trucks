<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class MainController extends Controller
{

    public function categories() {

        $data['categories'] = Category::get(['id', 'title']);

        return response()->json(['data' => $data, 'status' => 1]);

    }

    public function appVersion() {

        $setting = Setting::find(1);

        $data['version'] = $setting->version;

        return response(['data' => $data, 'status' => 1]);

    }

}
