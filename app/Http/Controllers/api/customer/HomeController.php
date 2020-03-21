<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Driver;

class HomeController extends Controller
{

    public function getDriverLocation($driver) {

        $driver = Driver::find($driver);

        if($driver) {

            $location['id'] = $driver->id;
            $location['name'] = $driver->name;
            $location['lat'] = $driver->current_lat;
            $location['lng'] = $driver->current_lng;

            $data['location'] = $location;

            return response(['data' => $data, 'status' => 1]);

        }else {

            return response(['message' => 'عفواً هذا السائق غير موجود', 'status' => 0]);

        }

    }

}
