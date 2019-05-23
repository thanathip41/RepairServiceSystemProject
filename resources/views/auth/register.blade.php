<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('navside/css/navside.css')}}" rel="stylesheet">

</head>

<body class="bg-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Service Repair</h1>
                  </div>
                  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                name="name" value="{{ old('name') }}" required autofocus placeholder="ชื่อ-นามสกุล">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif  
                    </div>
                    <div class="form-group">
                    <!-- <input id="department" type="text" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" 
                                name="department" value="{{ old('department') }}" required autofocus placeholder="แผนกงาน"> -->
                                <select name="department" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}"
                                value="{{ old('department') }}" required autofocus placeholder="แผนกงาน">
                                    <option value=1>ฝ่ายขาย</option>
                                    <option value=2>ฝ่ายไอที</option>
                                    <option value=3>ฝ่ายบุคคล</option>
                                    <option value=4>ฝ่ายการตลาด</option>
                                    <option value=5>ฝ่ายบริหาร</option>
                                    <option value=6>ฝ่ายบัญชี</option>
                                    <option value=7>ฝ่ายซ่อมบำรุง</option>
                                </select>
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" value="{{ old('email') }}" required placeholder="E-mail">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
                                name="username" value="{{ old('username') }}" required autofocus placeholder="Username">

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" required placeholder="รหัสผ่าน">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="ยืนยันรหัสผ่าน">
                    </div>
                
                    <div class="form-group">
                      <input id="img" type="file" class="form-control" name="img"  accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
                     </button>
                     <button type="reset" class="btn btn-secondary btn-user btn-block">
                                Reset
                                </button> 
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small"href="{{ route('login') }}">Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>

</html>
