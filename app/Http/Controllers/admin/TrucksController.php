<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Truck;
use App\Category;

class TrucksController extends Controller
{

    public function index() {

        $trucks = Truck::all();

        return view('admin.trucks.index', compact(['trucks']));

    }

    public function create() {

        $categories = Category::all();

        return view('admin.trucks.create', compact(['categories']));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'max_weight' => 'required',
            'start_price' => 'required|numeric',
            'km_price' => 'required|numeric',
            'factory' => 'required|numeric',
            'icon' => 'required|image'
        ]);

        $icon = time().'.'.$request->icon->getClientOriginalExtension();
        $request->icon->move(public_path('uploads/trucks/'), $icon);

        $truck = new Truck;
        $truck->title = $request->title;
        $truck->category_id = $request->category_id;
        $truck->max_weight = $request->max_weight;
        $truck->start_price = $request->start_price;
        $truck->km_price = $request->km_price;
        $truck->factory = $request->factory;
        $truck->icon = $icon;
        $truck->save();

        session()->flash('truck_created', 'تمت اضافة الشاحنة الجديده بنجاح');
        return redirect(url('/admin/trucks'));

    }


    public function edit(Truck $truck) {

        $categories = Category::all();

        return view('admin.trucks.edit', compact(['truck', 'categories']));

    }

    public function update(Request $request, Truck $truck) {

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'max_weight' => 'required',
            'start_price' => 'required|numeric',
            'km_price' => 'required|numeric',
            'factory' => 'required|numeric',
            'icon' => 'image'
        ]);

        if(isset($request->icon) && $request->icon != '') {

            $icon = time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->move(public_path('uploads/trucks/'), $icon);

            if(file_exists(public_path('uploads/trucks/'.$truck->icon))){
                unlink(public_path('uploads/trucks/'.$truck->icon));
            }

            $truck->icon = $icon;

        }

        $truck->title = $request->title;
        $truck->category_id = $request->category_id;
        $truck->max_weight = $request->max_weight;
        $truck->start_price = $request->start_price;
        $truck->km_price = $request->km_price;
        $truck->factory = $request->factory;
        $truck->save();

        session()->flash('truck_updated', 'تمت تعديل بيانات الشاحنة بنجاح');
        return redirect()->back();

    }

    public function delete(Truck $truck) {

        if($truck->orders->count()) {
            return redirect()->back()->with('delete_errors', 'عفواً تنتمي الي هذه الشاحنة عدة طلبية لذلك لا يمكنك حذفها');
        }

        $truck->delete();

        return redirect()->back()->with('truck_deleted', 'تم حذف الشاحنة بنجاح');

    }

}
