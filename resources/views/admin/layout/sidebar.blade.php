<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    
                    <li><a href="{{route('dashboard.index')}}" aria-expanded="false"><i class="fa fa-dashboard"></i><span
                                class="nav-text">Beranda</span></a>
                    </li>
                    @if(Session::get('level') == 'Admin')
                    <li><a href="{{route('users.index')}}" aria-expanded="false"><i class="icon icon-users-mm-2"></i><span
                                class="nav-text">Manajemen User</span></a>
                    </li>
                    @elseif(Session::get('level') == 'Resepsionis')
                    <li><a href="{{route('layanans.index')}}" aria-expanded="false"><i class="icon icon-wallet-90"></i><span
                                class="nav-text">Manajemen Layanan</span></a>
                    </li>
                    <li><a href="{{route('obats.index')}}" aria-expanded="false"><i class="mdi mdi-medical-bag"></i><span
                                class="nav-text">Manajemen Obat</span></a>
                    </li>
                    <li><a href="{{route('pasiens.index')}}" aria-expanded="false"><i class="icon icon-single-04"></i><span
                                class="nav-text">Manajemen Pasien</span></a>
                    </li>
                    <li><a href="{{route('antrians.index')}}" aria-expanded="false"><i class="fa fa-tasks"></i><span
                                class="nav-text">Antrian</span></a>
                    </li>
                    <li><a href="{{route('jadwals.index')}}" aria-expanded="false"><i class="fa fa-calendar"></i><span
                                class="nav-text">Jadwal</span></a>
                    </li>
                    <li><a href="{{route('pemeriksaans.index')}}" aria-expanded="false"><i class="fa fa-stethoscope"></i><span
                                class="nav-text">Pemeriksaan</span></a>
                    </li>
                    @elseif(Session::get('level') == 'Dokter')
                    <li><a href="{{route('pemeriksaans.index')}}" aria-expanded="false"><i class="fa fa-stethoscope"></i><span
                                class="nav-text">Pemeriksaan</span></a>
                    </li>

                    @elseif(Session::get('level') == 'Pasien')
                    <li><a href="{{route('pemeriksaans.index')}}" aria-expanded="false"><i class="fa fa-stethoscope"></i><span
                                class="nav-text">Rekam Medis</span></a>
                    </li>
                    @endif
                    <li><a href="{{route('logout')}}" aria-expanded="false"><i class="icon-key"></i><span
                                class="nav-text">Logout</span></a>
                    </li>
                    
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
