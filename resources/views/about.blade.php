@extends('layouts.app')

@section('content')
@breadcrumb([
    'breadcrumb_title' => "About",
    'breadcrumb_title_span' => "us"
]);
@endbreadcrumb
<section id="primary" class="content-full-width"> <!-- **Primary Starts Here** -->
    <div class="container">
        <div class="main-title animate" data-animation="pullDown" data-delay="100">
            <h3> About me </h3>
            <p> {{ trans("owner.about-me-sub-title") }}  </p>
        </div>
        <div class="dt-sc-service-content">
            <p> {{ trans("owner.about-little-intro") }} </p>
        </div>
        <div class="dt-sc-hr-invisible"></div>
        <div class="service-grid">
            <div class="dt-sc-one-half column first animate" data-animation="fadeInDown" data-delay="100">
                <img src="{{ asset('assets/images/about-img.png') }}" alt="" title="">
            </div>
            <div class="dt-sc-one-half column">
                <div class="dt-sc-icon-content-wrapper"><!-- *dt-sc-icon-content-wrapper Starts here** -->
                    <div class="dt-sc-one-half column first">
                        <div class="dt-sc-ico-content animate" data-animation="fadeInRight" data-delay="100">
                            <h6>About Me</h6>
                            <p><span>Name:</span> {{ trans("owner.name") }} </p>
                            <p><span>Location:</span>{{ trans("owner.location") }}</p>
                            <div class="dt-sc-hr-invisible-very-small"></div>
                            <p>{{ trans("owner.about-little-intro") }}</p>
                        </div>
                    </div>
                    <div class="dt-sc-one-half column dt-sc-icon-wrapper">
                        <div class="dt-sc-icon"><i class="fa fa-user-secret animate" data-animation="fadeInLeft" data-delay="100"></i></div>
                    </div>
                </div><!-- *dt-sc-icon-content-wrapper Ends here** -->
            </div>
            <div class="dt-sc-one-half column">
                <div class="dt-sc-icon-content-wrapper left"><!-- *dt-sc-icon-content-wrapper Starts here** -->
                    <div class="dt-sc-one-half column first dt-sc-icon-wrapper">
                        <div class="dt-sc-icon"><i class="fa fa-whatsapp animate" data-animation="fadeInLeft" data-delay="100"></i></div>
                    </div>
                    <div class="dt-sc-one-half column first">
                        <div class="dt-sc-ico-content animate" data-animation="fadeInRight" data-delay="100">
                            <h6>Get in touch</h6>
                            <p><i class="fa fa-map-marker"></i>{{ trans("owner.address") }}</p>
                            <p><i class="fa fa-phone"></i> {{ trans("owner.phone") }} </p>
                            <p><i class="fa fa-envelope"></i><a href="#">{{ trans("owner.email") }}</a></p>
                            <div class="dt-sc-hr-invisible-very-small"></div>
                            <h6>Follow me on</h6>
                            <ul class="type3 dt-sc-social-icons">
                                <li class="twitter"><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li class="facebook"><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li class="google"><a href="#"> <i class="fa fa-google"></i> </a></li>
                                <li class="dribbble"><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- *dt-sc-icon-content-wrapper Ends here** -->
            </div>
        </div>
    </div>
</section><!-- **Primary Ends Here** -->

@endsection
