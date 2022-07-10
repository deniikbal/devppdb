

<!DOCTYPE html>
<html lang="en">
<head>


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon.png')}}">

    <title>Login Web PPDB</title>

    <!-- vendor css -->
    <!-- vendor css -->

    <link href="{{asset('/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.auth.cs')}}s">
</head>
<body>


<div class="content content-fixed content-auth" style="padding: 5px">
    <div class="container">
        <div class="col-sm-6">
            <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
                <div class="card shadow-lg p-3">
                    <div class="card-body">
                        <img src="{{asset('/assets/img/logolog.png')}}" style="margin-left: 90px"
                             class="img-fluid" width="160" height="75">
                        <h3 class="tx-color-01 mg-b-5">PPDB SMA TELKOM BANDUNG</h3>
                        <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="yourname@yourmail.com">
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between mg-b-5">
                                    <label class="mg-b-0-f">Password</label>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <button class="btn btn-danger btn-block">Sign In</button>
                        </form>
                        <div class="tx-13 mg-t-20 tx-center">Belum memiliki akun? <a href="{{route('register')}}">Daftar Sekarang</a></div>
                    </div>
                </div>
            </div><!-- media -->
        </div>
    </div><!-- container -->
</div><!-- content -->

<footer class="footer mt-5">
    <div>
        <span>&copy; {{\Carbon\Carbon::now()->format('Y')}} DashForge v1.0.0. </span>
    </div>
    <div>
        <nav class="nav">
            <span>Designed by <a href="https://www.instagram.com/deni_ikbal/"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Deni Muhamad Ikbal</a></span>
        </nav>
    </div>
</footer>

<script src="{{asset('/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/lib/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/lib/jquery/jquery.min.js')}}"></script>

<script src="{{asset('/assets/js/dashforge.js')}}"></script>

<!-- append theme customizer -->
<script src="{{asset('/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('/assets/js/dashforge.settings.js')}}"></script>
<script>
    $(function(){
        'use script'

        window.darkMode = function(){
            $('.btn-white').addClass('btn-dark').removeClass('btn-white');
        }

        window.lightMode = function() {
            $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
        }

        var hasMode = Cookies.get('df-mode');
        if(hasMode === 'dark') {
            darkMode();
        } else {
            lightMode();
        }
    })
</script>
</body>
</html>
