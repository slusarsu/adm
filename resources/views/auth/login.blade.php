@extends('adm.layouts.auth')

@section('content')

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('adm_data/assets/images/login/3.jpg')}}" alt="looginpage"></div>
                <div class="col-xl-7 p-0">
                    <div class="login-card">
                        <form class="theme-form login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4>{{ __('Login') }}</h4>
                            <h6>Welcome back! Log in to your account.</h6>
                            <div class="form-group">
                                <label>{{ __('Email Address') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-email"></i></span>
                                    <input class="form-control" type="email" placeholder="Test@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" placeholder="*********" name="password" required autocomplete="current-password">
                                    <div class="show-hide"><span class="show">                         </span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="text-muted" for="checkbox1">{{ __('Remember password') }}</label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block w-100" type="submit">{{ __('Sign in') }}</button></div>
                            <div class="login-social-title">
                                <h5>Sign in with</h5>
                            </div>
                            <div class="form-group">
                                <ul class="login-social">
                                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram">                  </i></a></li>
                                </ul>
                            </div>
                            <p>Don't have account?<a class="ms-2" href="{{route('register')}}">{{ __('Create Account') }}</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
