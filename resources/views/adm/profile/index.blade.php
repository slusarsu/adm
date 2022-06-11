@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.profile')}}
        </x-slot>
        <li class="breadcrumb-item">{{__('adm.profile')}}</li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile header start-->
                <div class="col-sm-12">
                    <div class="card profile-header">

                        <img class="img-fluid bg-img-cover" src="{{asset('adm/assets/images/user-profile/bg-profile.jpg')}}" alt="">

                        <div class="profile-img-wrrap">
                            <img class="img-fluid bg-img-cover" src="{{asset('adm/assets/images/user-profile/bg-profile.jpg')}}" alt="">
                        </div>

                        <div class="userpro-box">

                            <div class="img-wrraper">
                                <div class="avatar"><img class="img-fluid" alt="" src="{{asset('adm/assets/images/user/7.jpg')}}">
                                </div><a class="icon-wrapper" href="{{route('adm.profile-edit', $profile->user->id)}}">
                                    <i class="icofont icofont-pencil-alt-5"></i>
                                </a>
                            </div>

                            <div class="user-designation">

                                <div class="title">
                                        <h4>
                                            @if($profile->first_name) {{$profile->first_name}} @endif
                                            @if($profile->last_name) {{$profile->last_name}} @endif
                                            @if($profile->middle_name) {{$profile->middle_name}} @endif
                                        </h4>
                                        <h6>{{$profile->user->getRoleLabelsString()}}</h6>
                                </div>

                                <div class="social-media">
                                    <ul class="user-list-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
{{--                                <div class="follow">--}}
{{--                                    <ul class="follow-list">--}}
{{--                                        <li>--}}
{{--                                            <div class="follow-num counter">325</div><span>Follower</span>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="follow-num counter">450</div><span>Following</span>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="follow-num counter">500</div><span>Likes</span>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user profile header end-->
                <div class="col-xl-3 col-lg-12 col-md-5 xl-35">
                    <div class="default-according style-1 faq-accordion job-accordion">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h5>Sample Card</h5><span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    </div>
                                    <div class="card-body">
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12 col-md-7 xl-65">
                    <div class="row">
                        <!-- profile post start-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h5>Sample Card</h5><span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                                <div class="card-body">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                </div>
                            </div>
                        </div>
                        <!-- profile post end-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection