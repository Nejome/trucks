<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Setting;
use App\Truck;
use App\Http\Resources\TruckResource;

class MainController extends Controller
{

    public function categories() {

        $data['categories'] = CategoryResource::collection(Category::all());

        return response()->json(['data' => $data, 'status' => 1]);

    }

    public function appVersion() {

        $setting = Setting::find(1);

        $data['version'] = $setting->version;

        return response(['data' => $data, 'status' => 1]);

    }

    public function trucks() {

        $data['trucks'] = TruckResource::collection(Truck::with('category')->get());

        return response(['data' => $data, 'status' => 1]);

    }

}
