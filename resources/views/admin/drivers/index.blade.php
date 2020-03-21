
@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">السائقين</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0">
                                        <a href="{{url('/admin/drivers/create')}}" class="btn btn-success p-2 pl-3 pr-3">
                                            <span>اضافة سائق</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @if(session()->has('driver_created'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('driver_created')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('activated'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('activated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('charged'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('charged')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('driver_deleted'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('driver_deleted')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif


                        @if(session()->has('field_exist'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('field_exist')}}</span>
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
                                <th scope="col">رقم الهاتف</th>
                                <th scope="col">الرقم الوطني</th>
                                <th scope="col">رقم اللوحة</th>
                                <th scope="col">الرصيد</th>
                                <th scope="col">الطلبيات</th>
                                <th scope="col">في ساعات العمل</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($drivers as $driver)
                                <tr class="text-center">
                                    <td>{{$driver->name}}</td>
                                    <td>{{$driver->phone}}</td>
                                    <td>{{$driver->identification}}</td>
                                    <td>{{$driver->truck_plate}}</td>
                                    <td>{{$driver->balance}}</td>
                                    <td>5</td>
                                    <td>
                                        @if($driver->available == 1)
                                            <span class="text-success">نعم</span>
                                        @else
                                            <span class="text-danger">لا</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/drivers/'.$driver->id.'/charge_balance')}}">
                                            <i class="fas fa-wallet text-blue"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{url('/admin/drivers/'.$driver->id.'/edit')}}">
                                            <i class="fas fa-edit text-warning"></i>
                                        </a>
                                        &nbsp;
                                        <a href="#" onclick="delete_confirm('{{url('/admin/drivers/'.$driver->id.'/delete')}}')">
                                            <i class="fas fa-trash-alt text-danger fa-1x"></i>
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
                                {{ $drivers->links() }}
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
        function delete_confirm(url) {
            var result = confirm('هل انت متأكد انك تريد حذف هذا السائق ؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
