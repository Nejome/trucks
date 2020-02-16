<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;

class DriversController extends Controller
{

    public function index() {

        $drivers = Driver::where('status', 1)->paginate(10);

        return view('admin.drivers.index', compact(['drivers']));

    }

    public function active(Driver $driver) {

        $driver->status = 1;
        $driver->save();

        session()->flash('activated', 'تم تفعيل السائق بنجاح');
        return redirect(url('admin/drivers'));

    }

    public function create() {

        return view('admin.drivers.create');

    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:drivers',
            'phone2' => 'unique:drivers',
            'truck_plate' => 'required',
            'truck_plate_image' => 'required|image',
            'identification' => 'required',
            'identification_image' => 'required|image',
        ]);

        $truck_plate_image = time().'.'.$request->truck_plate_image->getClientOriginalExtension();
        $request->truck_plate_image->move(public_path('uploads/drivers/trucks_plates/'), $truck_plate_image);

        $identification_image = time().'.'.$request->identification_image->getClientOriginalExtension();
        $request->identification_image->move(public_path('uploads/drivers/identifications/'), $identification_image);

        $driver = new Driver;
        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->phone2 = $request->phone2;
        $driver->truck_plate = $request->truck_plate;
        $driver->identification = $request->identification;
        $driver->truck_plate_image = $truck_plate_image;
        $driver->identification_image = $identification_image;
        $driver->status = 1;
        $driver->balance = $request->balance;
        $driver->save();

        session()->flash('driver_created', 'تمت اضافة وتفعيل السائق الجديد بنجاح');
        return redirect(url('/admin/drivers'));

    }

    public function charge_balance_page(Driver $driver) {

        return view('admin.drivers.charge_balance', compact(['driver']));

    }

    public function charge_balance(Request $request, Driver $driver) {

        $this->validate($request, [
           'balance' => 'required|numeric|min:1'
        ]);

        $driver->balance = $driver->balance + $request->balance;
        $driver->save();

        session()->flash('charged', 'تم شحن الرصيد للسائق بنجاح');
        return redirect(url('admin/drivers'));

    }

    public function edit(Driver $driver) {

        return view('admin.drivers.edit', compact(['driver']));

    }

    public function update(Request $request, Driver $driver) {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|unique:drivers,phone,'.$driver->id,
            'phone2' => 'unique:drivers,phone2,'.$driver->id,
            'truck_plate' => 'required',
            'truck_plate_image' => 'image',
            'identification' => 'required',
            'identification_image' => 'image',
        ]);

        if(isset($request->truck_plate_image) && $request->truck_plate_image != '') {

            $truck_plate_image = time().'.'.$request->truck_plate_image->getClientOriginalExtension();
            $request->truck_plate_image->move(public_path('uploads/drivers/trucks_plates'), $truck_plate_image);

            if(file_exists(public_path('uploads/drivers/trucks_plates/'.$driver->truck_plate_image))){
                unlink(public_path('uploads/drivers/trucks_plates/'.$driver->truck_plate_image));
            }

            $driver->truck_plate_image = $truck_plate_image;

        }

        if(isset($request->identification_image) && $request->identification_image != '') {

            $identification_image = time().'.'.$request->identification_image->getClientOriginalExtension();
            $request->identification_image->move(public_path('uploads/drivers/identifications'), $identification_image);

            if(file_exists(public_path('uploads/drivers/identifications/'.$driver->identification_image))){
                unlink(public_path('uploads/drivers/identifications/'.$driver->identification_image));
            }

            $driver->identification_image = $identification_image;

        }

        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->phone2 = $request->phone2;
        $driver->truck_plate = $request->truck_plate;
        $driver->identification = $request->identification;
        $driver->save();

        session()->flash('driver_updated', 'تمت تعديل بيانات السائق بنجاح');
        return redirect()->back();

    }

    public function delete(Driver $driver) {

        if(file_exists(public_path('uploads/drivers/trucks_plates/'.$driver->truck_plate_image))){
            unlink(public_path('uploads/drivers/trucks_plates/'.$driver->truck_plate_image));
        }

        if(file_exists(public_path('uploads/drivers/identifications/'.$driver->identification_image))){
            unlink(public_path('uploads/drivers/identifications/'.$driver->identification_image));
        }

        $driver->delete();

        session()->flash('driver_deleted', 'تمت حذف السائق بنجاح');
        return redirect()->back();

    }

}
