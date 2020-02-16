@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">شحن رصيد السائق</h3>
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

                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{url('/admin/drivers/'.$driver->id.'/charge_balance')}}">

                            {{csrf_field()}}

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم</label>
                                            <input type="text" value="{{$driver->name}}" class="form-control form-control-alternative" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">رقم الهاتف</label>
                                            <input type="text" value="{{$driver->phone}}" class="form-control form-control-alternative" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 m-auto">
                                        <div class="form-group">
                                            <label class="form-control-label">الرصيد المضاف</label>
                                            <input type="number" name="balance" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="شحن">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
