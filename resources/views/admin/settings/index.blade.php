@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-10 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">الإعدادات</h3>
                            </div>
                            <div class="col-4 text-left">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#password_modal">تعديل كلمة المرور</a>
                            </div>
                        </div>


                        <div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="card bg-secondary shadow border-0">

                                            <div class="card-header bg-transparent">
                                                <div class="text-muted text-center"><small>تعديل كلمة المرور</small></div>
                                            </div>

                                            <div class="card-body px-lg-5 py-lg-5">

                                                <form method="POST" action="{{url('/admin/settings/change_password')}}" role="form">

                                                    {{csrf_field()}}

                                                    <div class="form-group mb-3">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                            </div>
                                                            <input class="form-control" type="password" name="old_password" placeholder="كلمة المرور الحالية">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                            </div>
                                                            <input class="form-control" type="password" name="password" placeholder="كلمة المرور الجديدة">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                                            </div>
                                                            <input class="form-control" type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور الجديدة">
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary my-4">تعديل</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                        @if(session()->has('settings_updated'))
                            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                <span class="alert-inner--text">{{session()->get('settings_updated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('change_success'))
                            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                <span class="alert-inner--text">{{session()->get('change_success')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('wrong_password'))
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                <span class="alert-inner--text">{{session()->get('wrong_password')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{url('/admin/settings')}}">

                            {{csrf_field()}}

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >اسم مدير النظام</label>
                                            <input type="text" value="{{$user->name}}" name="name" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">نسبة العمولة %</label>
                                            <input type="number" value="{{$setting->commission_rate}}" name="commission_rate" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">اصدارة التطبيق</label>
                                            <input type="text" value="{{$setting->version}}" name="version" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="تعديل">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
