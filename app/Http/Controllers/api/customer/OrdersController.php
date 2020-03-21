<?php

namespace App\Http\Controllers\api\customer;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Truck;
use App\Driver;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderCreated;
use App\Events\OrderAccepted;

class OrdersController extends Controller
{

    public function create(Request $request) {

        $this->validate($request, [
            'customer_id' => 'required',
            'truck_id' => 'required',
            'shipment_weight' => 'required',
            'from_lat' => 'required',
            'from_lng' => 'required',
            'to_lat' => 'required',
            'to_lng' => 'required',
        ]);

        $customer = Customer::find($request->customer_id);
        if(!$customer){
            return response()->json(['message' => 'عفواً العميل غير موجود', 'status' => 0]);
        }

        $truck = Truck::find($request->truck_id);
        if(!$truck) {
            return response()->json(['message' => 'عفواً الشاحنة التي طلبتها غير موجودة', 'status' => 0]);
        }

        //count price
        $kms = number_format($this->getDistanceBetweenPoints($request->from_lat, $request->from_lng, $request->to_lat, $request->to_lng));
        $price = $truck->km_price * $kms * $truck->factory;
        if($price < $truck->start_price) {
            $price = $truck->start_price;
        }

        //create order
        $order = new Order;
        $order->customer_id = $request->customer_id;
        $order->truck_id = $truck->id;
        $order->customer_phone = $request->customer_phone;
        $order->shipment_type = $request->shipment_type;
        $order->shipment_description = $request->shipment_description;
        $order->shipment_weight = $request->shipment_weight;
        $order->from_lat = $request->from_lat;
        $order->from_lng = $request->from_lng;
        $order->to_lat = $request->to_lat;
        $order->to_lng = $request->to_lng;
        $order->price = $price;
        $order->save();

        $data['order'] = $order;

        //broadcast
        broadcast(new OrderCreated($order))->toOthers();

        return response()->json(['data' => $data, 'status' => 1]);

    }

    public function changeStatus(Request $request, $order) {

        $order = Order::find($order);
        if(!$order){
            return response()->json(['message' => 'عفواً الطلبية غير موجودة', 'status' => 0]);
        }

        if(!in_array($request->status, [0, 1, 2, 3])){
            return response()->json(['message' => 'عفواً رمز الحالة المرسل غير صحيح', 'status' => 0]);
        }

        if($order->status == 2){
            return response()->json(['message' => 'عفواً هذه الطلبية مكتملة', 'status' => 0]);
        }

        if($order->status == 3){
            return response()->json(['message' => 'عفواً تم الغاء هذه الطلبية', 'status' => 0]);
        }

        if($request->status == 1){
            $this->validate($request, ['driver_id' => 'required']);

            $driver = Driver::find($request->driver_id);
            if(!$driver){
                return response()->json(['message' => 'عفواً السائق غير موجود', 'status' => 0]);
            }

            $settings = Setting::find(1);
            $rate = $settings->commission_rate;
            $commission = $order->price * $rate/100;

            if($driver->balance < $commission){
                return response()->json(['message' => 'عفواً رصيدك لا يكفي', 'status' => 0]);
            }

            $order->driver_id = $request->driver_id;

            //broadcast
            broadcast(new OrderAccepted($order))->toOthers();

        }

        if($request->status == 2){
            if(isset($order->driver_id) && $order->driver_id != ''){
                $settings = Setting::find(1);
                $rate = $settings->commission_rate;
                $commission = $order->price * $rate/100;

                $driver = $order->driver;
                $driver->balance -= $commission;
                $driver->save();
            }else{
                return response()->json(['message' => 'عفواً الطلبية غير مكتملة', 'status' => 0]);
            }
        }

        $order->status = $request->status;
        $order->save();

        $data['order'] = $order;

        return response()->json(['data' => $data, 'status' => 1]);

    }

    public function details($order) {

        $order = Order::find($order);
        if(!$order){
            return response()->json(['message' => 'عفواً الطلبية غير موجودة', 'status' => 0]);
        }

        $data['order'] = $order;

        return response()->json(['data' => $data, 'status' => 1]);

    }

    public function myOrders() {

        $customer = Auth::guard('customer')->user();

        $data['orders'] = $customer->orders;

        return response()->json(['data' => $data, 'status' => 1]);

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
