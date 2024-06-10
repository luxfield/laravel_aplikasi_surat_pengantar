@extends('parent/body')

@section('body')

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p class="h3">SISTEM INFORMASI SURAT
                MENYURAT

            </p>
            <p class="h4">
                RT 17 RW 10 JAKARTA TIMUR
            </p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">buat password baru</p>

                <form  method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control" name="email" value="{{$userEmail ?? "" }}">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route("login.auth") }}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    @endsection