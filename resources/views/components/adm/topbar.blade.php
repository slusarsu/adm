<div class="page-main-header">
    <div class="main-header-right row m-0">
        <div class="main-header-left">
            <div class="logo-wrapper"><a href="{{route('adm')}}"><img class="img-fluid" src="{{asset('adm_data/assets/images/logo/logo.png')}}" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="{{route('adm')}}"><img class="img-fluid" src="{{asset('adm_data/assets/images/logo/dark-logo.png')}}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
        </div>
        <div class="left-menu-header col">
            <ul>
                <li>
                    <a class="btn btn btn-primary-light" href="/">
                        {{__('adm.visit_site')}}
                        <i class="fa fa-eye"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="onhover-dropdown p-0">
                    <button class="btn btn-primary-light" type="button"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                    >
                        <a href="login_two.html">
                            <i data-feather="log-out"></i>Log out
                        </a>
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>