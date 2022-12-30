
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/img/favicon.png')}}">

    <title> {{\Illuminate\Support\Str::title($sub)}}</title>

    <!-- vendor css -->
    <link href="{{asset('lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">

    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/dashforge.dashboard.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/lib/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/lib/prismjs/prism.js')}}"></script>
<script src="{{asset('/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="{{asset('/assets/js/dashforge.js')}}"></script>
<script src="{{asset('/assets/js/dashforge.aside.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    //message with toastr
    @if(session()->has('success'))

    toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
    toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>


<script>
    $('#example2').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Cari data...',
            sSearch: '',
            lengthMenu: '_MENU_ items/halaman',
        },
    });

</script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap"
        });
    });
</script>
@yield('script')
</body>
</html>
