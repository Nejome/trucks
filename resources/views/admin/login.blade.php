<!DOCTYPE html>
<html lang="AR">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>الشاحنات - لوحة التحكم</title>

    <link href="{{asset('cp/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('cp/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('cp/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">

</head>
<body>


<div class="main-content">

    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
            <a class="navbar-brand" href="{{url('/admin')}}">
                <span style="color: white; font-size: 30px;">الشاحنات</span>
            </a>
        </div>
    </nav>

    <!-- Header -->
    <div class="header bg-gradient-success py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-4">
                <div class="row justify-content-center">

                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-2">

                        @if(session()->has('wrong'))
                            <div class="alert alert-danger">{{session()->get('wrong')}}</div>
                        @endif

                        <div class="text-muted text-center mt-2"><h2>لوحة التحكم</h2></div>

                    </div>
                    <div class="card-body px-lg-5 py-lg-5">

                        <form method="POST" action="{{url('/admin/login')}}" role="form">

                            {{csrf_field()}}

                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="البريد الإلكتروني" value="{{old('email')}}" type="email" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="كلمة المرور" type="password" name="password">
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-success my-4" value="تسجيل الدخول">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{asset('cp/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('cp/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('cp/assets/js/argon.js?v=1.0.0')}}"></script>

</body>
</html>
