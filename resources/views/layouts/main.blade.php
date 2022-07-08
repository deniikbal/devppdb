
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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon.png')}}">

    <title> {{\Illuminate\Support\Str::title($sub)}}</title>

    <!-- vendor css -->
    <link href="{{asset('lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">

    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" />




    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.dashboard.css')}}">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{asset('/lib/select2/css/select2.min.css')}}" rel="stylesheet">

</head>
<body>

@include('layouts.sidebar')

<div class="content ht-100v pd-0">
    <div class="content-header">
        <div class="content-search">
            <i data-feather="search"></i>
            <input type="search" class="form-control" placeholder="Search...">
        </div>
        <nav class="nav">
            <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
            <a href="" class="nav-link"><i data-feather="grid"></i></a>
            <a href="" class="nav-link"><i data-feather="align-left"></i></a>
        </nav>
    </div><!-- content-header -->

    <div class="content-body">
        <div class="container pd-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="#">{{$main}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$sub}}</li>
                        </ol>
                    </nav>

                </div>
            </div>
            @yield('content')
        </div><!-- container -->
    </div>
</div>

<script src="{{asset('/lib/jquery/jquery.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{asset('/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/lib/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/lib/prismjs/prism.js')}}"></script>
<script src="{{asset('/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>


<script src="{{asset('/assets/js/dashforge.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('/assets/js/dashforge.aside.js')}}"></script>



<script>
    //message with toastr
    @if(session()-> has('success'))

    toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()-> has('error'))
    toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>

<script>
    var quill = new Quill('#quill_editor', {
        theme: 'snow'
    });
    quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });
</script>


<script>
    $('.select2').select2({
        placeholder: 'Choose one',
        searchInputPlaceholder: 'Search options',
    });

    // $(document).ready(function() {
    //     $('.select2').select2();
    // });

    $('#example2').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Cari data...',
            sSearch: '',
            lengthMenu: '_MENU_ items/halaman',
        }
    });

</script>
</body>
</html>
