<?php

namespace App\Http\Controllers\api\driver;

use App\Driver;
use App\Events\OrderAccepted;
use App\Http\Controllers\Controller;
use App\Order;
use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function details($order) {

        $order = Order::find($order);
        if(!$order){
            return response()->json(['message' => 'عفواً الطلبية غير موجودة', 'status' => 0]);
        }

        $data['order'] = $order;

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
                $driver->balance = $driver->balance - $commission;
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

}
