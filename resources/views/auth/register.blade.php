<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
          <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/gasanLogo.png') }}">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body class="hold-transition register-page">

<section class="content">
      <div class="container-fluid">


    <div class="card card-outline card-purple">
    <div class="card-header text-center">
        <div class="row">
            <img src="{{URL::to('public/img/gasanLogo.png')}}" style="width: 100px; height: 100px; padding-right: 20px"  alt="description of myimage">
            <p class="text-purple " style="font-size: 50px;">Budget Utilization Monitoring System</p>
        </div>
    </div>
        <div class="card-body ">
            <p class="login-box-msg">Register Account</p>

            <form method="post" action="{{ route('register') }}">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong> {{ Session::get('success')}}</strong>
                    </div>
                @endif
                @if (Session::get('error'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong> {{ Session::get('error')}}</strong>

                    </div>
                @endif
                @csrf
                <div class="row">

                <label class="input-group col-xs-2 col-md-4 mb-0">Last Name:</label>


                <label class="input-group col-xs-2 col-md-4 mb-0">First Name:</label>


                <label class="input-group col-xs-2 col-md-4 mb-0">Middle Name:</label>

                </div>
                <div class="row">
                <div class="input-group col-xs-3 col-md-4 mb-3">
                    <input type="text"
                           name="lastName"
                           class="form-control @error('lastName') is-invalid @enderror"
                           value="{{ old('lastName') }}"
                           placeholder="last Name">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                    @error('lastName')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

                </div>



                <div class="input-group col-xs-3 col-md-4 mb-3">

                    <input type="text"
                           name="firstName"
                           class="form-control @error('firstName') is-invalid @enderror"
                           value="{{ old('firstName') }}"
                           placeholder="First Name">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                    @error('firstName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group col-xs-3 col-md-4 mb-3">
                    <input type="text"
                           name="middleName"
                           class="form-control @error('middleName') is-invalid @enderror"
                           value="{{ old('middleName') }}"
                           placeholder="Middle Name">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                    @error('middleName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                </div>

                <div class="row">
                <label class="input-group col-xs-2 col-md-4 mb-0">UserName:</label>
                <label class="input-group col-xs-2 col-md-4 mb-0">Password:</label>
                <label class="input-group col-xs-2 col-md-4 mb-0">Retype Password:</label>

                </div>

                <div class="row">
                <div class="input-group  col-xs-3 col-md-4 mb-2">
                    <input type="text"
                           name="userName"
                           class="form-control @error('userName') is-invalid @enderror"
                           value="{{ old('userName') }}"
                           placeholder="userName">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                    @error('userName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group  col-xs-3 col-md-4 mb-2">
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password">
                    <div class="input-group-append">
                        <div type="button" id="show_password" class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
         
                <div class="input-group  col-xs-3 col-md-4 mb-2">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>

                </div>
          



                <div class="row">
                    <div class="col-8">
                    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

    <!-- /.form-box -->
    </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
