@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تفاصيل الطلبية</h3>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >اسم السائق</label>
                                        <input type="text" value="@if(isset($order->driver)) {{$order->driver->name}} @else - @endif" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">اسم العميل</label>
                                        <input type="text" value="{{$order->customer->name}}" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >نوع الشاحنة</label>
                                        <input type="text" value="{{$order->truck->title}}" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">رقم هاتف العميل</label>
                                        <input type="text" value="{{$order->customer_phone}}" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >نوع الشحنة</label>
                                        <input type="text" value="{{$order->shipment_type}}" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">وزن الشحنة</label>
                                        <input type="text" value="{{$order->shipment_weight}}" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >وصف الشحنة</label>
                                        <textarea class="form-control form-control-alternative" disabled>{{$order->shipment_description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >السعر</label>
                                        <input type="text" value="{{$order->price}}" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">الحالة</label>
                                        <input type="text" value="@if($order->status == 0)البحث عن سائق@elseif($order->status == 1)تحت التنفيذ@elseif($order->status == 2)تمت بنجاح@elseif($order->status == 3)تم الالغاء@endif" class="form-control form-control-alternative" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label">المسار</label>

                                        <input type="hidden" id="from_lat" value="{{$order->from_lat}}">
                                        <input type="hidden" id="from_lng" value="{{$order->from_lng}}">
                                        <input type="hidden" id="to_lat" value="{{$order->to_lat}}">
                                        <input type="hidden" id="to_lng" value="{{$order->to_lng}}">

                                        <input type="hidden" id="from_icon" value="{{asset('cp/images/from.png')}}">
                                        <input type="hidden" id="to_icon" value="{{asset('cp/images/to.png')}}">

                                        <div id="map" class="form-control form-control-alternative" style="height: 400px;"></div>

                                        <div class="mt-4">
                                            <img src="{{asset('cp/images/from.png')}}">من&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <img src="{{asset('cp/images/to.png')}}">الي
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <a href="{{url('admin/orders')}}" class="btn btn-secondary">رجوع</a>
                    </div>

                </div>
            </div>

        </div>

    </div>

    @push('pageScript')

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKUtiN-bHruEDPRjKN_-qjq1Kg8WAOjUI"></script>
        <script>

            var from_lat = document.getElementById('from_lat').value;
            var from_lng = document.getElementById('from_lng').value;
            var to_lat = document.getElementById('to_lat').value;
            var to_lng = document.getElementById('to_lng').value;

            var mapOptions = {
                zoom: 5,
                center: new google.maps.LatLng(to_lat, to_lng)
            };

            map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var from_pos = new google.maps.LatLng(from_lat, from_lng);
            var from_icon = document.getElementById('from_icon').value;
            marker = new google.maps.Marker({
                position: from_pos,
                icon: from_icon,
                animation: google.maps.Animation.DROP,
                map: map
            });

            var to_pos = new google.maps.LatLng(to_lat, to_lng);
            var to_icon = document.getElementById('to_icon').value;
            marker = new google.maps.Marker({
                position: to_pos,
                icon: to_icon,
                animation: google.maps.Animation.DROP,
                map: map
            });

        </script>

    @endpush

@endsection
