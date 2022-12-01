<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset("assets/images/logo-icon.png")}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <a href="{{ url('/') }}" class="logo-text">{{ config('app.name', 'Laravel') }}</a>
        </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Kriteria</div>
            </a>
        <ul>
            <li> <a href="{{url("/kriteria")}}"><i class="bi bi-arrow-right-short"></i>Daftar Kriteria</a></li>
            <li> <a href="{{url("/kriteria/nilai")}}"><i class="bi bi-arrow-right-short"></i>Nilai Kriteria</a></li>
        </ul>
        </li>
        <li>
            <a href="{{url("/alternatif")}}">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Alternatif</div>
            </a>
        </li>
        </li>
        <li>
            <a href="{{url("/perhitungan")}}">
                <div class="parent-icon"><i class="bx bx-calculator"></i>
                </div>
                <div class="menu-title">Perhitungan</div>
            </a>
        </li>
        </li>
        <li>
            <a href="{{url("/password")}}">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Password</div>
            </a>
        </li>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class="bx bx-exit"></i>
                </div>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->