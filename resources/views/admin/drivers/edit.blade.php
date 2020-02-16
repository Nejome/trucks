@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">بيانات سائق</h3>
                            </div>
                        </div>


                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mt-4 text-left" role="alert" style="direction: ltr;">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('driver_updated'))
                            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                <span class="alert-inner--text">{{session()->get('driver_updated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{url('/admin/drivers/'.$driver->id.'/update')}}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم</label>
                                            <input type="text" value="{{$driver->name}}" name="name" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">رقم الهاتف</label>
                                            <input type="text" value="{{$driver->phone}}" name="phone" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >رقم الهاتف الاضافي (اختياري)</label>
                                            <input type="text" value="{{$driver->phone2}}" name="phone2" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">الرصيد الابتدائي</label>
                                            <input type="text" value="{{$driver->balance}}" name="balance" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الرقم الوطني</label>
                                            <input type="text" value="{{$driver->identification}}" name="identification" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">رقم اللوحة</label>
                                            <input type="text" value="{{$driver->truck_plate}}" name="truck_plate" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >صورة الرقم الوطني الحالية</label>
                                            <img src="{{asset('uploads/drivers/identifications/'.$driver->identification_image)}}" width="100%" height="200px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">صورة رقم اللوحة الحالية</label>
                                            <img src="{{asset('uploads/drivers/trucks_plates/'.$driver->truck_plate_image)}}" width="100%" height="200px">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >صورة الرقم الوطني</label>
                                            <input type="file" name="identification_image" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">صورة رقم اللوحة</label>
                                            <input type="file" name="truck_plate_image" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                @if($driver->status == 0)
                                    <a href="{{url('/admin/drivers/'.$driver->id.'/active')}}" class="btn btn-success m-1">تفعيل</a>
                                @endif
                                <input type="submit" class="btn btn-warning m-1" value="تعديل">
                                <a href="{{url('/admin/drivers')}}" class="btn btn-secondary m-1">رجوع</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
