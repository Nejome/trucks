<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function create(Request $request) {

        $this->validate($request, [
            'shipment_weight' => 'required',
            'from_lat' => 'required',
            'from_lng' => 'required',
            'to_lat' => 'required',
            'to_lng' => 'required',
        ]);

        //count price

        return number_format($this->getDistanceBetweenPoints($request->from_lat, $request->from_lng, $request->to_lat, $request->to_lng));

        //create order

        //broadcast

    }

    function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return $kilometers;
    }

}
