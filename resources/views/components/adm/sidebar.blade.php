<header class="main-nav">

    <div class="sidebar-user text-center">

        <a class="setting-primary" href="javascript:void(0)">
            <i data-feather="settings"></i>
        </a>

        <img class="img-90 rounded-circle" src="{{asset('/assets/images/dashboard/1.png')}}" alt="">

        <div class="badge-bottom">
            <span class="badge badge-primary">New</span>
        </div>

        <a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{$user->name}}</h6>
        </a>

        <p class="mb-0 font-roboto">
            {{$roleLabels}}
        </p>

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

                    @foreach($adminMenu as $menu)
                        <li class="sidebar-main-title">
                            <div>
                                <h6>{{$menu['section']}}</h6>
                            </div>
                        </li>
                        @foreach($menu['items'] as $menuItem)

                            @if($menuItem['type'] === 'dropdown')
                                <li class="dropdown">
                                    <a class="nav-link menu-title" href="javascript:void(0)">
                                        {!! $menuItem['icon'] !!}
                                        <span>{{$menuItem['title']}}</span>
                                    </a>
                                    <ul class="nav-submenu menu-content">
                                        @foreach($menuItem['items'] as $submenu)
                                            <li>
                                                <a href="{{$submenu['url']}}">{{$submenu['title']}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif

                            @if($menuItem['type'] === 'link')
                                <li>
                                    <a class="nav-link menu-title link-nav" href="{{$menuItem['url']}}">
                                        {!! $menuItem['icon'] !!}
                                        <span>{{$menuItem['title']}}</span>
                                    </a>
                                </li>
                            @endif

                        @endforeach
                    @endforeach

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>