@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">السائقين الجدد الغير مفعلين</h2>
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">الاسم</th>
                                <th scope="col">رقم الهاتف</th>
                                <th scope="col">الرقم الوطني</th>
                                <th scope="col">رقم اللوحة</th>
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
                                    <td>
                                        <a href="{{url('/admin/drivers/'.$driver->id.'/edit')}}">
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
                                {{ $drivers->links() }}
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
