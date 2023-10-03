<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <title>PPDB SMA TELKOM BANDUNG</title>
    <meta content="" name="description"/>
    <meta content="" name="keywords"/>

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon"/>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"/>

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/flex.css')}}" rel="stylesheet"/>


    <!-- Template Main CSS File -->
    <script src="{{asset('assets/js/chart.js')}}"></script>

</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{asset('/assets/img/logo.png')}}" alt=""/>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#features">Alur Pendaftaran</a></li>
                <li><a class="nav-link scrollto" href="#services">Jadwal</a></li>
                <li><a class="nav-link scrollto" href="#pricing">Keunggulan</a></li>
                <li><a class="nav-link scrollto" href="#team">Management</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">PPDB Online</h1>
                <h3 data-aos="fade-up">SMA TELKOM BANDUNG</h3>
                <h4 data-aos="fade-up" data-aos-delay="400" class="mt-3">Untuk calon pendaftar tahun ajaran
                    2024/2025 bisa mendaftar melalui website ini atau langsung datang ke tempat pendaftaran</h4>
                <div data-aos="fade-up" data-aos-delay="600">

                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                @if(Auth::user()->role == 'admin')
                                    <div class="text-center text-lg-start">
                                        <a href="{{ route('dashboard') }}" target="_blank"
                                           class="btn btn-danger d-inline-flex align-items-center justify-content-center align-self-center">
                                            <i class="bi bi-person-plus-fill ml-2"></i> <span>Admin</span>
                                        </a>
                                    </div>
                                @else
                                    <div class="text-center text-lg-start">
                                        <a href="{{ route('students.index') }}" target="_blank"
                                           class="btn btn-danger d-inline-flex align-items-center justify-content-center align-self-center">
                                            <i class="bi bi-person-plus-fill ml-2"></i> <span>Home</span>
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="text-center text-lg-start">
                                    <a href="{{ route('register') }}" target="_blank"
                                       class="btn btn-danger d-inline-flex align-items-center justify-content-center align-self-center">
                                        <i class="bi bi-person-plus-fill ml-2"></i>
                                        <span>Daftar Sekarang</span>
                                    </a>
                                    <a href="{{ route('login') }}" target="_blank"
                                       class="btn btn-danger d-inline-flex align-items-center justify-content-center align-self-center">
                                        <span>Login</span>
                                        <i class="bi bi-box-arrow-in-right"></i>
                                    </a>
                                </div>
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{asset('/assets/img/bc.jpg')}}" class="img-fluid" alt=""/>
            </div>
            <div class="modal" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->
<main id="main">
    <!-- ======= Counts Section ======= -->
    @php
        $jumlahdaftar = \App\Models\Student::all()->count();
        $pesertatest = \App\Models\Test::all()->count();
        $kuota = \App\Models\Setting::find(1)->first();
    @endphp
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <div>

                            <span data-purecounter-start="0" data-purecounter-end="{{$jumlahdaftar}}"
                                  data-purecounter-duration="1" class="purecounter"></span>
                            <p>Total Pendaftar</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-building" style="color: #ee6c20"></i>
                        <div>
                                    <span data-purecounter-start="0" data-purecounter-end="{{$pesertatest}}"
                                          data-purecounter-duration="1" class="purecounter"></span>
                            <p>Peserta Sudah Test</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-file-earmark" style="color: #15be56"></i>
                        <div>
                                    <span data-purecounter-start="0" data-purecounter-end="2"
                                          data-purecounter-duration="1" class="purecounter"></span>
                            <p>Data Jurusan</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-person-circle" style="color: #ff0000"></i>
                        <div>
                                    <span data-purecounter-start="0" data-purecounter-end="{{$kuota->jumlah_pendaftar}}"
                                          data-purecounter-duration="1" class="purecounter"></span>
                            <p>Kuota Pendaftaran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>ALUR PENDAFTARAN</p>
            </header>
            <div class="row">
                <!-- Feature Icons -->
                <div class="row feature-icons" data-aos="fade-up">
                    <p>Terdapat beberapa step pendaftaran yang harus dipenuhi agar semua rangkaian pendaftaran
                        hingga seleksi berjalan dengan lancar </p>

                    <div class="row">
                        <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{asset('/assets/img/features-3.png')}}" class="img-fluid p-4"
                                 alt=""/>
                        </div>

                        <div class="col-xl-8 d-flex content">
                            <div class="row align-self-center gy-4">
                                <div class="col-md-6 icon-box" data-aos="fade-up">
                                    <i class="ri-number-1"></i>
                                    <div>
                                        <h4>Pendaftaran</h4>
                                        <p>Untuk pendaftaran bisa online dengan mengisi data di web ppdb atau
                                            datang langsung ke Sekolah SMA Telkom Bandung</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <i class="ri-number-2"></i>
                                    <div>
                                        <h4>Mengisi Formulir</h4>
                                        <p>Mengisi formulir selengkap mungkin sesuai form</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                    <i class="ri-number-3"></i>
                                    <div>
                                        <h4>Melengkapi Berkas</h4>
                                        <p>Silahkan Lengkapi Berkas</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                    <i class="ri-number-4"></i>
                                    <div>
                                        <h4>Menentukan Jadwal Test</h4>
                                        <p>Panitia PPDB akan menjadwalkan test PPDB</p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                    <i class="ri-number-5"></i>
                                    <div>
                                        <h4>Melaksanakan Test dan Wawancara</h4>
                                        <p>Calon Siswa Melaksanakan Test PPDB dan Wawancara Siswa dan Orang Tua
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                    <i class="ri-number-6"></i>
                                    <div>
                                        <h4>Pengumuman Test</h4>
                                        <p>Panitia PPDB Mengumumkan hasil Test</p>
                                    </div>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                    <i class="ri-number-7"></i>
                                    <div>
                                        <h4> Melengkapi Administrasi Pendidikan</h4>
                                        <p>Silahkan calon siswa untuk melengkapi administrasi pendidikan</p>
                                    </div>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                                    <i class="ri-number-8"></i>
                                    <div>
                                        <h4>Mengisi Formulir Daftar Ulang</h4>
                                        <p>Melengkapi formulir Daftar ulang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Feature Icons -->
            </div>
            <header class="section-header">
                <h2>Persyaratan</h2>
                <p>Persyaratan Pendaftaran</p>
            </header>

            <div class="row">

                <div class="col-lg-4">
                    <img src="{{asset('/assets/img/features.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-8 mt-5 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Foto Copy Akte Lahir 1 Lembar</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Foto Copy KK 1 Lembar</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Foto Copy Raport Semester 1-5 </h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>SKKB dari Sekolah 1 Lembar</h3>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Ijazah 1 Lembar</h3>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Surat Keterangan Lulus 1 Lembar</h3>
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- / row -->
    </section>
    <!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>JADWAL PENDAFTARAN</p>
            </header>

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-box red">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Gelombang 1</h3>
                        <strong>
                            <p>Jalur Prestasi 1</p>
                        </strong>
                        <p style="font-size: 12px">Akademik /Non Akademik / Tahfidz Qur'an</p>
                        <p>1 September s/d 31 Desember 2022</p>
                        <strong>
                            <p>Jalur Reguler 1</p>
                        </strong>
                        <p>1 September s/d 31 Desember 2022</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-box red">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Gelombang 2</h3>
                        <strong>
                            <p>Jalur Prestasi 2</p>
                        </strong>
                        <p style="font-size: 12px">Akademik /Non Akademik / Tahfidz Qur'an</p>
                        <p>1 Januari s/d 31 Maret 2023</p>
                        <strong>
                            <p>Jalur Reguler 2</p>
                        </strong>
                        <p>1 Januari s/d 31 Maret 2023</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-box red">
                        <i class="ri-discuss-line icon"></i>
                        <h3>Gelombang 3<span>**</span></h3>
                        <strong>
                            <p>Jalur Reguler 3</p>
                        </strong>
                        <p>1 April s/d 31 Juni 2023</p>
                        <br>
                        <br>
                        <p><strong><span>**</span>Jika Kuota Masih Ada</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    <!-- ======= F.A.Q Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Keunggulan</h2>
                <p>Kenapa harus SMA TELKOM?</p>
            </header>

            <div class="row gy-4" data-aos="fade-left">
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <h3 style="color: #07d5c0">CONVERSATION CLASS</h3>
                        <img src="{{asset('/assets/img/pricing-free.png')}}" class="img-fluid" alt=""/>
                        <p style="text-align: justify;">Conversation Class bersama Mahasiswa International yang
                            berasal dari Negara-negara Eropa dan Asia telah berjalan dari Tahun 2012 hingga saat
                            ini
                            masih tetap dilaksanakan</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="box">
                        <span class="featured">Unggulan</span>
                        <h3 style="color: #65c600">TAHFIDZ QUR'AN</h3>
                        <img src="{{asset('/assets/img/pricing-starter.png')}}" class="img-fluid" alt=""/>
                        <p style="text-align: justify;">Seluruh Siswa Muslim SMA Telkom Bandung Bebas buta huruf
                            Qur'an dengan metode Tutor Teman Sebaya dan program One Class One Juz Hapalan Qur'an
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="box">
                        <h3 style="color: #ff901c">ENTERPRENEUR SCHOOL</h3>
                        <img src="{{asset('/assets/img/pricing-business.png')}}" class="img-fluid" alt=""/>
                        <p style="text-align: justify;">SMA Telkom Bandung menyelenggarakan pendidikan yang
                            terintegrasi antara ICT, Wawasan Lingkungan dan Enterpreneurship (kewirausahaan)
                            dengan
                            dukungan fasilitas yang memadai.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Aplikasi</h2>
                <p>Aplikasi Pendukung Sekolah</p>
            </header>

            <div class="clients-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="/assets/img/clients/client-11.png" class="img-fluid"
                                                   alt=""/></div>
                    <div class="swiper-slide"><img src="/assets/img/clients/client-22.png" class="img-fluid"
                                                   alt=""/></div>
                    <div class="swiper-slide"><img src="/assets/img/clients/client-33.png" class="img-fluid"
                                                   alt=""/></div>
                    <div class="swiper-slide"><img src="/assets/img/clients/client-44.png" class="img-fluid"
                                                   alt=""/></div>
                    <div class="swiper-slide"><img src="/assets/img/clients/client-55.png" class="img-fluid"
                                                   alt=""/></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{asset('/assets/img/logo.png')}}" alt=""/>
                        </a>
                        <p>Selamat datang diweb PPDB SMA TELKOM BANDUNG</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Tautan Lain</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Alur Pendaftaran</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Jadwal</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Keunggulan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Testimoni</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                        <h4>Hubungi Kami</h4>
                        <p>
                            <a href="https://api.whatsapp.com/send?phone=+62081322299010&text=Assalamualaikum%252525252C%2525252Bmohon%2525252Binfo%2525252Bpendaftaran"
                               target="_blank"><i class="bi bi-phone"></i> +6281322299010 (Bu Nissa)</a> <br/>
                            <a href="https://api.whatsapp.com/send?phone=+62081398877234&text=Assalamualaikum%252525252C%2525252Bmohon%2525252Binfo%2525252Bpendaftaran"
                               target="_blank"><i class="bi bi-phone"></i> +6281398877234 (Bu Ranti)</a> <br/>
                            <a href="https://api.whatsapp.com/send?phone=+62082116497877&text=Assalamualaikum%252525252C%2525252Bmohon%2525252Binfo%2525252Bpendaftaran"
                               target="_blank"><i class="bi bi-phone"></i> +6282116497877 (Bu Lilis)</a> <br/>
                            <strong>Phone:</strong> (022) 5229478<br/>
                            <strong>Email:</strong> smatelkombandung@ypt.or.id<br/>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{--    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--        <div class="modal-dialog modal-dialog-centered wd-sm-400" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-body pd-20 pd-sm-40">--}}
    {{--                    <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </a>--}}

    {{--                    <div>--}}
    {{--                        <h4>Create New Account</h4>--}}
    {{--                        <p class="tx-color-03">It's free to signup and only takes a minute.</p>--}}
    {{--                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>--}}
    {{--                            @csrf--}}
    {{--                            <div class="form-group mb-2">--}}
    {{--                                <label>Alamat Email</label>--}}
    {{--                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"--}}
    {{--                                       placeholder="youremail@email.com" value="{{old('email')}}" required>--}}
    {{--                                @error('email')--}}
    {{--                                <div class="invalid-feedback">--}}
    {{--                                    {{$message}}--}}
    {{--                                </div>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group mb-2">--}}
    {{--                                <div class="d-flex justify-content-between mg-b-5">--}}
    {{--                                    <label class="mg-b-0-f">Password</label>--}}
    {{--                                </div>--}}
    {{--                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"--}}
    {{--                                       placeholder="Password min:8" value="{{old('password')}}" required>--}}
    {{--                                @error('password')--}}
    {{--                                <div class="invalid-feedback">--}}
    {{--                                    {{ $message }}--}}
    {{--                                </div>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group mb-2">--}}
    {{--                                <label>Nama Lengkap</label>--}}
    {{--                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"--}}
    {{--                                       placeholder="Tulis Nama Lengkap" value="{{old('name')}}" required>--}}
    {{--                                @error('name')--}}
    {{--                                <div class="invalid-feedback">--}}
    {{--                                    {{ $message }}--}}
    {{--                                </div>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group mb-2">--}}
    {{--                                <label>No Whatsapp</label>--}}
    {{--                                <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror"--}}
    {{--                                       placeholder="081234567819" value="{{old('nohp')}}" required>--}}
    {{--                                @error('nohp')--}}
    {{--                                <div class="invalid-feedback">--}}
    {{--                                    {{ $message }}--}}
    {{--                                </div>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group tx-12">--}}

    {{--                            </div>--}}
    {{--                            <button class="btn btn-danger btn-block" type="submit">Create Account</button>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div><!-- modal-body -->--}}
    {{--            </div><!-- modal-content -->--}}
    {{--        </div><!-- modal-dialog -->--}}
    {{--    </div><!-- modal -->--}}


    <!-- Vendor JS Files -->
    <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
