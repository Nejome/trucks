@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">تصنيفات الشاحنات</h2>
                            </div>
                        </div>

                        @if(session()->has('category_exist'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('country_exist')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('category_updated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('category_updated')}}</span>
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
                                <th scope="col">#</th>
                                <th scope="col">اسم التصنيف</th>
                                <th scope="col">عدد الشاحنات</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr class="text-center">
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>10</td>
                                    <td>

                                        <a href="{{url('/admin/categories/'.$category->id.'/edit')}}">
                                            <i class="fas fa-edit text-warning"></i>
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
