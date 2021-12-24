@extends('layouts.app1')

@section('content')
<div class="breadcrumb"><!-- *BreadCrumb Starts here** -->
    <div class="container">
        <h2>Welcome <span>back</span></h2>
        <div class="user-summary">
            <div class="account-links">
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </div>
</div><!-- *BreadCrumb Ends here** -->
<section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
    <div class="fullwidth-section"><!-- Full-width section Starts Here -->
        <div class="container">
            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h3> Login </h3>
            </div>
        </div>
        <div class="dt-sc-hr-invisible-toosmall"></div>
        <div class="container">
            <div class="dt-sc-three-fourth column first pullDown" data-animation="fadeInDown">
                <div class="login-register-form">
                <form class="enquiry-form" method="POST" action="{{ route('login') }}" novalidate="novalidate" >
                    @csrf
{{--                    <div class="column dt-sc-one-third">--}}
{{--                    <div class="col-md-6 col-sm-6 col-xs-12">--}}
                        <div class="column dt-sc-one-third first fadeInRight">
                            <p class="input-text">
                                Email
                            </p>
                        </div>
                        <div class="column dt-sc-two-third fadeInLeft mb-2">
                            <p class="input-text mb-1">
                                <input class="input-field @error('email') is-invalid @enderror" type="email" required="" name="email" title="Enter your valid email" placeholder="Email *"  autocomplete="current-email"/>
                            </p>
                            @error('email')
                            <div class="column dt-sc-one-third">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                            @enderror
                        </div>

                        <div class="column dt-sc-one-third first fadeInRight">
                            <p class="input-text">
                                Password
                            </p>
                        </div>
                        <div class="column dt-sc-two-third fadeInLeft mb-2">
                            <p class="input-text mb-1">
                                <input name="password" class="input-field @error('password') is-invalid @enderror" type="password" placeholder="Enter your password" autocomplete="current-password"/>
                            </p>
                            @error('password')
                            <div class="column dt-sc-one-third">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                            @enderror
                        </div>

                    <p class="submit"> <input type="submit" value="{{ __('Login') }}" name="submit" class="button" /> </p>
{{--                    <div class="column dt-sc-one-third">--}}
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
{{--                    </div>--}}
                </form>
                </div>
                {{-- <div id="ajax_contactform_msg"></div> --}}

            </div>

        </div>
    </div><!-- Full-width section Ends Here -->
</section><!-- **Primary Ends Here** -->
@endsection
