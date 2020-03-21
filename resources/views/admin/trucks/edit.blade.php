@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تعديل بيانات الشاحنة</h3>
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

                        @if(session()->has('truck_updated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                                <span class="alert-inner--text">{{session()->get('truck_updated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{url('/admin/trucks/'.$truck->id.'/update')}}" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم</label>
                                            <input type="text" value="{{$truck->title}}" name="title" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">التصنيف</label>
                                            <select name="category_id" class="form-control form-control-alternative">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if($truck->category_id == $category->id) selected @endif>{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >اقصي وزن</label>
                                            <input type="text" value="{{$truck->max_weight}}" name="max_weight" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">السعر الابتدائي</label>
                                            <input type="text" value="{{$truck->start_price}}" name="start_price" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >سعر الكيلو</label>
                                            <input type="text" value="{{$truck->km_price}}" name="km_price" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">معامل الحساب</label>
                                            <input type="text" value="{{$truck->factory}}" name="factory" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الايقونة الحالية</label>
                                            <img src="{{asset('uploads/trucks/'.$truck->icon)}}" width="100%" height="200px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الايقونة</label>
                                            <input type="file" name="icon" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-warning" value="تعديل">
                                <a href="{{url('admin/trucks')}}" class="btn btn-secondary">رجوع</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
