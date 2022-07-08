
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <title>Register Web PPDB</title>

    <!-- vendor css -->
    <link href="{{asset('/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.auth.cs')}}s">
</head>
<body>

<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
            <div class="card shadow-lg p-4">
               <div class="card-body">
                   <img src="{{asset('/assets/img/logolog.png')}}" style="margin-left: 90px"
                        class="img-fluid" width="160" height="75">
                   <div class="sign-wrapper">
                       <div class="wd-100p">
                           <h3 class="tx-color-01 mg-b-5 text-center">PPDB SMA TELKOM 2023</h3>
                           <form method="POST" action="{{ route('register') }}">
                               @csrf
                               <div class="form-group mb-2">
                                   <label>Alamat Email</label>
                                   <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                          placeholder="youremail@email.com">
                                   @error('email')
                                   <div class="invalid-feedback">
                                       {{ $message }}
                                   </div>
                                   @enderror
                               </div>
                               <div class="form-group mb-2">
                                   <div class="d-flex justify-content-between mg-b-5">
                                       <label class="mg-b-0-f">Password</label>
                                   </div>
                                   <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                                          placeholder="Password min:8 ">
                                   @error('password')
                                   <div class="invalid-feedback">
                                       {{ $message }}
                                   </div>
                                   @enderror
                               </div>
                               <div class="form-group mb-2">
                                   <label>Nama Lengkap</label>
                                   <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                          placeholder="Tulis Nama Lengkap">
                                   @error('name')
                                   <div class="invalid-feedback">
                                       {{ $message }}
                                   </div>
                                   @enderror
                               </div>
                               <div class="form-group mb-2">
                                   <label>No Whatsapp</label>
                                   <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror"
                                          placeholder="081234567819">
                                   @error('nohp')
                                   <div class="invalid-feedback">
                                       {{ $message }}
                                   </div>
                                   @enderror
                               </div>
                               <div class="form-group tx-12">

                               </div>
                               <button class="btn btn-danger btn-block" type="submit">Create Account</button>
                               <div class="tx-13 mg-t-20 tx-center">Sudah pernah daftar? <a href="{{route('login')}}">Sign In</a></div>
                           </form>
                       </div>
                   </div><!-- sign-wrapper -->
               </div>
            </div>
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->


<footer class="footer">
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

<script src="../../lib/jquery/jquery.min.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../lib/feather-icons/feather.min.js"></script>
<script src="../../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script src="../../assets/js/dashforge.js"></script>

<!-- append theme customizer -->
<script src="../../lib/js-cookie/js.cookie.js"></script>
<script src="../../assets/js/dashforge.settings.js"></script>
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
