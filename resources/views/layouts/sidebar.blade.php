<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="../../index.html" class="aside-logo">PPDB<span>{{\Carbon\Carbon::now()->format('Y')}}</span></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <div class="aside-loggedin">
            <div class="d-flex align-items-center justify-content-start">
                @php
                $user = new \App\Models\User();
                $gravatar = $user->gravatar($user->email);
                @endphp
                <div class="avatar avatar-xl">
                    <img src="{{Auth::user()->avatar == null ? asset('images/icon-avatar.jpg') : asset('storage/'. Auth::user()->avatar)}}" class="rounded-circle" alt="">
                </div>
                <div class="aside-alert-link">
                    <a href="" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
                    <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a>
                    <a data-toggle="tooltip" title="Sign out" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="aside-loggedin-user">
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
                    <h6 class="tx-semibold mg-b-0">{{Auth::user()->name}}</h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-05 tx-12 mg-b-0 badge badge-danger">{{Auth::user()->role}}</p>
            </div>
            <div class="collapse" id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile Oke</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="help-circle"></i> <span>Help Center</span></a></li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i data-feather="log-out"></i><span>Sign out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
            <li class="nav-label">Dashboard</li>

            <li class="nav-item active"><a href="{{route('dashboard')}}" class="nav-link"><i data-feather="shopping-bag"></i> <span>Dashboard</span></a></li>

            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="user"></i> <span>Main Data</span></a>
                <ul>
                    <li><a href="{{route('school.index')}}">Data Sekolah</a></li>
                </ul>
            </li>
            <li class="nav-label mg-t-25">Calon Siswa Baru</li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="user"></i> <span>Calon Siswa</span></a>
                <ul>
                    <li><a href="{{route('student.index')}}">All Siswa</a></li>
                    <li><a href="{{route('belumverifikasi')}}">Belum Terverifikasi</a></li>

                </ul>
            </li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="file"></i> <span>Pembayaran</span></a>
                <ul>
                    <li><a href="{{route ('vp')}}">Verifikasi Pembayaran </a></li>
                    <li><a href="{{route('tp')}}">Titipan Pembayaran</a></li>
                    <li><a href="{{route ('du')}}">Titipan DU</a></li>
                    <li><a href="{{route ('allpayment')}}">All Payment</a></li>
                </ul>
            </li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="book-open"></i> <span>Test Akademik</span></a>
                <ul>
                    <li><a href="{{route('pesertatest')}}">Peserta</a></li>
                </ul>
                <ul>
                    <li><a href="{{route('lulustest')}}">Lulus</a></li>
                </ul>
                <ul>
                    <li><a href="{{route('tdklulustest')}}">Tidak Lulus</a></li>
                </ul>
                <ul>
                    <li><a href="{{route('mundur')}}">Mundur</a></li>
                </ul>
            </li>
            <li class="nav-label mg-t-25">Pages</li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="user"></i> <span>User</span></a>
                <ul>
                    <li><a href="{{route('users')}}">User Management</a></li>
                </ul>
            </li>
            <li class="nav-label mg-t-25">User Interface</li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="settings"></i> <span>Setting</span></a>
                <ul>
                    <li><a href="{{route('whatsapp.index')}}">Setting WhatsApp</a></li>
                    <li><a href="{{route('setting')}}"><span>Setting</span></a></li>
                    <li><a href="{{route('example.index')}}"><span>Example</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
