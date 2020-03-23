<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url({{asset('images/bg-01.jpg')}});">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form"
                  action="{{ route('register') }}" method="post">
                @csrf
                <span class="login100-form-title p-b-49">
						Register
					</span>

                @if(Session::has('alert'))
                    <div class="alert-success row">{{ Session::get('alert') }}</div>
                @endif

                <div class="wrap-input100 validate-input m-b-23">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="name" placeholder="Type your username">
                    <span class="focus-input100 @error('email') alert-danger @enderror" id="username" value="{{ old('name') }} data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-23">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" placeholder="Type your email">
                    <span class="focus-input100 @error('email') alert-danger @enderror" id="email" value="{{ old('email') }} data-symbol="&#xf206;"></span>
                </div>

                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                @error('email')
                <p style="color: red">{{ $message }}</p>
                @enderror

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Type your password">
                    <span class="focus-input100 @error('password') alert-danger @enderror" id="password" value="{{ old('password') }} data-symbol="&#xf190;"></span>
                </div>

                @error('password')
                <p style="color: red">{{ $message }}</p>
                @else
                    @if(Session::has('wrong'))
                        <p style="color: red">{{Session::get('wrong')}}</p>
                    @endif
                    @enderror

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Re-type Password</span>
                        <input class="input100" type="password" name="password_confirmation" placeholder="">
                    </div>

                    <div class="container-login100-form-btn" style="mg-t:20px">
                        <div class="wrap-login100-form-btn" style="margin-top: 30px">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit" value="Register">
                                Register
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12" style="margin-top: 16px">
                            <a href="{{route('login.index')}}" class="text-center">Already an account?</a>
                        </div>
                    </div>


                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/bootstrap/js/popper.js')}}vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
