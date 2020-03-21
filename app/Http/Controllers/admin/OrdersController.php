<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index() {

        $orders = Order::paginate(10);

        return view('admin.orders.index', compact(['orders']));

    }

    public function details(Order $order) {

        return view('admin.orders.details', compact(['order']));

    }

    public function delete(Order $order){

        $order->delete();

        return redirect()->back()->with('deleted', 'تم حذف الطلبية بنجاح');

    }

}
