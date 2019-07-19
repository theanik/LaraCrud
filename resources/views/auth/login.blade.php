@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('logf/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('logf/css/style.css')}}">
@endpush
@section('content')

<div class="container">
        <section class="sign-in">
                <div class="container">
                        <form method="POST" action="{{ route('login') }}">
                                @csrf
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="{{asset('logf/images/signup-image.jpg')}}" alt="sing up image"></figure>
                            {{-- <a href="#" class="signup-image-link">Create an account</a> --}}
                        </div>
    
                        <div class="signin-form">
                            <h2 class="form-title">Log In</h2>

                                <div class="form-group">
                                    <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    {{-- <input type="text" name="your_name" id="your_name" placeholder="Your Name"/> --}}
                                    <input type="email" id="email" placeholder="Your Email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                
                                </div>
                                <div class="form-group">
                                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input id="password" type="password" placeholder="Your Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                                </div>
                                <div class="form-group row ml-5">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                    </div>
                            
                            <div class="social-login">
                                <span class="social-label">Or login with</span>
                                <ul class="socials">
                                    <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </section>
    
</div>
@push('js')
<script src="{{asset('logf/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@endpush
@endsection
