@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">الطلبيات</h2>
                            </div>
                        </div>

                        @if(session()->has('driver_created'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('driver_created')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">اسم العميل</th>
                                <th scope="col">اسم السائق</th>
                                <th scope="col">نوع الشحنة</th>
                                <th scope="col">السعر</th>
                                <th scope="col">الحالة</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr class="text-center">
                                    <td>{{$order->driver->name}}</td>
                                    <td>{{$order->customer->name}}</td>
                                    <td>{{$order->shipment_type}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>
                                        @if($order->status == 0)
                                            <span>البحث عن سائق</span>
                                        @elseif($order->status == 1)
                                            <span class="text-primary">تحت التنفيذ</span>
                                        @elseif($order->status == 2)
                                            <span class="text-success">تمت بنجاح</span>
                                        @elseif($order->status == 3)
                                            <span class="text-danger">تم الالغاء</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-eye text-success fa-1x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer py-4">
                        <nav>
                            <ul class="pagination justify-content-end mb-0 float-right">
                                {{ $orders->links() }}
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
