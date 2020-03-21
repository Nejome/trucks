@extends('admin.layouts.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">العملاء</h2>
                            </div>
                        </div>

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('deleted')}}</span>
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
                                <th scope="col">رقم هاتف العميل</th>
                                <th scope="col">عدد طلبيات</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($customers as $customer)
                                <tr class="text-center">
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>10</td>
                                    <td>

                                        <a href="#" onclick="delete_confirm('{{url("admin/customers/".$customer->id."/delete")}}')">
                                            <i class="fas fa-trash text-danger"></i>
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

    <script>
        function delete_confirm(url) {
            var result = confirm('هل انت متأكد انك تريد حذف هذا العميل؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
