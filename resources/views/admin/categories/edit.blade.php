@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">تعديل التصنيف</h2>
                            </div>
                        </div>

                        @if(session()->has('category_exist'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('category_exist')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>

                    <div class="card-body" style="background-color: #f5f7f9 !important;">

                        <form method="POST" action="{{url('/admin/categories/'.$category->id.'/update')}}">

                            {{csrf_field()}}

                            <div class="form-group mt-2" style="margin-bottom: 0 !important;">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-table"></i></span>
                                    </div>
                                    <input class="form-control" name="title" value="{{$category->title}}" type="text">
                                </div>
                                <p class="text-danger mt-1">{{$errors->first('title')}}</p>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">تعديل</button>
                                <a href="{{url('/admin/categories')}}" class="btn btn-secondary mt-4">رجوع</a>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
