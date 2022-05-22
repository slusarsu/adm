<header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)">
        <i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('/assets/images/dashboard/1.png')}}" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{$user->name}}</h6></a>
        <p class="mb-0 font-roboto">Human Resources Department</p>
        <ul>
            <li><span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li><span>2 year</span>
                <p>Experince</p>
            </li>
            <li><span><span class="counter">95.2</span>k</span>
                <p>Follower </p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Dashboard</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="index.html">Default</a></li>
                            <li><a href="dashboard-02.html">Ecommerce</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Widgets</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="general-widget.html">General</a></li>
                            <li><a href="chart-widget.html">Chart</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>Page layout</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="box-layout.html">Boxed</a></li>
                            <li><a href="layout-rtl.html">RTL</a></li>
                            <li><a href="layout-dark.html">Dark</a></li>
                            <li><a href="footer-light.html">Footer Light</a></li>
                            <li><a href="footer-dark.html">Footer Dark</a></li>
                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="bookmark.html"><i data-feather="heart"></i><span>Bookmarks</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>