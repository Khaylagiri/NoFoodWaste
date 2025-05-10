<header class="main-nav">
    <div class="sidebar-user text-center">
        <!-- <img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6></a>
        <p class="mb-0 font-roboto">Human Resources Department</p> -->
    </div>
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <!-- Tombol Kembali di mobile -->
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <!-- Menu Dashboard -->
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{ route('dashboard') }}">
                            <i data-feather="bar-chart-2"></i>  <!-- Ikon untuk Dashboard -->
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{ route('penerima.riwayat') }}">
                            <i class="fas fa-history"></i>
                            <span>Riwayat Makanan</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</header>