<?php

namespace App\Http\Controllers\api\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;
use App\Http\Resources\DriverResource;

class DriverController extends Controller
{

    public function login(Request $request){

        $driver = Driver::where('phone', $request->phone)->first();

        if($driver){

            $data['driver'] = new DriverResource($driver);
            $data['token'] =  $driver->createToken($driver->name)->accessToken;
            return response()->json(['data' => $data, 'status' => 1]);

        } else {

            return response()->json(['message' => 'عفواً انت غير مسجل', 'status' => 0]);

        }

    }

    public function updateLocation(Request $request) {

        $this->validate($request, [
           'lat' => 'required',
           'lng' => 'required'
        ]);

        $driver = $request->user();

        $driver->current_lat = $request->lat;
        $driver->current_lng = $request->lng;
        $driver->save();

        $data['driver'] = new DriverResource($driver);
        return response()->json(['data' => $data, 'status' => 1]);

    }

    public function logout(Request $request) {

        $request->user()->token()->delete();

        return response()->json(['status' => 1]);

    }

}
