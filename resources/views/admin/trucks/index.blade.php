@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">الشاحنات</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0">
                                        <a href="{{url('/admin/trucks/create')}}" class="btn btn-success p-2 pl-3 pr-3">
                                            <span>اضافة شاحنة</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @if(session()->has('truck_created'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('truck_created')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('truck_deleted'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('truck_deleted')}}</span>
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
                                <th scope="col">الاسم</th>
                                <th scope="col">التصنيف</th>
                                <th scope="col">اقصي وزن</th>
                                <th scope="col">السعر الابتدائي</th>
                                <th scope="col">سعر الكيلو</th>
                                <th scope="col">معامل الحساب</th>
                                <th scope="col">الايقونة</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($trucks as $truck)
                                <tr class="text-center">
                                    <td>{{$truck->title}}</td>
                                    <td>{{$truck->category->title}}</td>
                                    <td>{{$truck->max_weight}}</td>
                                    <td>{{$truck->km_price}}</td>
                                    <td>{{$truck->factory}}</td>
                                    <td>5</td>
                                    <td>
                                        @if(isset($truck->icon) && $truck->icon != '')
                                            <img src="{{asset('uploads/trucks/'.$truck->icon)}}" width="100%" height="100px">
                                        @else
                                            لم تتم اضافتها بعد
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/trucks/'.$truck->id.'/edit')}}">
                                            <i class="fas fa-edit text-warning"></i>
                                        </a>
                                        &nbsp;
                                        <a href="#">
                                            <i class="fas fa-trash-alt text-danger fa-1x"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
