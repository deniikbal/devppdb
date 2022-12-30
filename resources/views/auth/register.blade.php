
<!doctype html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/signup/style.css')}}">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap">
                    <div class="img" style="background-image: url(images/logo.png);"></div>
                    <h3 class="text-center mb-4">Sign Up</h3>
                    <form action="{{route('register')}}" method="post" class="signup-form">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Your Email Address" value="{{old('email')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input id="password-field" type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password min:8">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Nama Lengkap" value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror"
                                   placeholder="Nomor Whatsapp" value="{{old('nohp')}}">
                            @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                        </div>
                    </form>
                    <p class="text-center">I'm already a member! <a href="{{route('login')}}">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script>
    (function($) {

        "use strict";

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    })(jQuery);
</script>

</body>
</html>

