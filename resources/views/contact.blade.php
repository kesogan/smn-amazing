@extends('layouts.app')

@section('content')
@breadcrumb([
    'breadcrumb_title' => "Contact",
    'breadcrumb_title_span' => "us"
]);
@endbreadcrumb
<section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
    <div class="fullwidth-section"><!-- Full-width section Starts Here -->
        <div class="container">
            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h3> Contact </h3>
                <p> {{ trans("owner.contact-sub-title") }} </p>
            </div>
        </div>
        <div class="contact-section"><!-- **contact-section Starts Here** -->
            <div id="contact_map" class="animate" data-animation="fadeInRight" data-delay="100"></div>
            <div class="dt-sc-contact-info animate" data-animation="fadeInLeft" data-delay="100">
                <h3>Artist Info</h3>
                <div class="dt-sc-contact-details"><span class="fa fa-map-marker"></span> Address: {{ trans("owner.adress") }} </div>
                <div class="dt-sc-contact-details"><span class="fa fa-tablet"></span> Phone: {{ trans("owner.phone") }} </div>
                <div class="dt-sc-contact-details"><span class="fa fa-envelope"></span> Email: <a href="mailto:{{ trans("owner.email") }}">{{ trans("owner.email") }}</a> </div>
                <ul class="type3 dt-sc-social-icons">
                    <li class="twitter"><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                    <li class="facebook"><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                    <li class="google"><a href="#"> <i class="fa fa-google"></i> </a></li>
                    <li class="dribbble"><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                    <li class="pinterest"><a href="#"> <i class="fa fa-pinterest"></i> </a></li>
                    <li class="linkedin"><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                    <li class="flickr"><a href="#"> <i class="fa fa-flickr"></i> </a></li>
                    <li class="tumblr"><a href="#"> <i class="fa fa-tumblr"></i> </a></li>
                </ul>
            </div>
        </div><!-- **contact-section Ends Here** -->
        <div class="dt-sc-hr-invisible-toosmall"></div>
        <div class="container">
            <div class="dt-sc-three-fourth column first animate" data-animation="fadeInDown" data-delay="100">
                <h3>Get in Touch</h3>
                <form class="enquiry-form" action="php/send.php" method="post" novalidate="novalidate" name="enqform" >
                    <div class="column dt-sc-one-third first">
                        <p class="input-text">
                            <input class="input-field" type="text" required="" name="txtname" title="Enter your Name" placeholder="Name *"/>
                        </p>
                    </div>
                    <div class="column dt-sc-one-third">
                        <p class="input-text">
                            <input class="input-field" type="email" required="" autocomplete="off" name="txtemail" title="Enter your valid id" placeholder="Email *"/>
                        </p>
                    </div>
                    <div class="column dt-sc-one-third">
                        <p class="input-text">
                            <input class="input-field" type="text" autocomplete="off" placeholder="Website"/>
                        </p>
                    </div>
                    <p class="input-text">
                        <textarea class="input-field" required="" rows="3" cols="5" name="txtmessage" title="Enter your Message" placeholder="Message *"></textarea>
                    </p>

                    <p class="submit"> <input type="submit" value="Send" name="submit" class="button" /> </p>
                </form>
                <div id="ajax_contactform_msg"></div>
            </div>
            {{--<div class="dt-sc-one-fourth column animate" data-animation="fadeInRight" data-delay="100">
                <h5>London Office</h5>
                <div class="enquiry-details">
                    <p> <i class="fa fa-cab"></i> 121 King St, Melbourne VIC 3, Australia </p>
                    <p> <i class="fa fa-phone"></i> +61 3 8376 6284 </p>
                    <p> <i class="fa fa-globe"></i> <a href="#"> envato.com </a> </p>
                    <p> <i class="fa fa-envelope"></i> <a href="#"> redart@gmail.com </a> </p>
                </div>
                <h5>Business Hours</h5>
                <ul class="dt-sc-working-hours">
                    <li>Hotline is available for 24 hours a day!..</li>
                    <li>Monday - Friday :<span> 8am to 6pm</span></li>
                    <li>Saturday : <span>10am to 2pm</span></li>
                    <li>Sunday : <span>Closed</span></li>
                </ul>
            </div>--}}
            {{--<div class="newsletter"><!--Newsletter Form Starts Here -->
                    <h3>Newsletter</h3>
                    <form method="post" class="mailchimp-form dt-sc-one-half column first animate" data-animation="stretchLeft" data-delay="100" name="frmnewsletter" action="php/subscribe.php">
                        <p class="input-text">
                            <input class="input-field" type="email" name="mc_email" value="" required/>
                            <label class="input-label">
                                    <i class="fa fa-envelope-o icon"></i>
                                    <span class="input-label-content">Mail</span>
                                </label>
                            <input type="submit" name="submit" class="submit" value="Subscribe" />
                        </p>
                    </form>
                    <div id="ajax_subscribe_msg"></div>

                    <div class="newsletter-text animate dt-sc-one-half column" data-animation="stretchRight" data-delay="100"> <i class="fa fa-envelope-o"> </i> Feel free to place your Mail_ID and Subscribe to our Newsletter here. So that, you can receive our exiting Updates and Offers with no wait! </div>
            </div><!--Newsletter Form Ends Here -->--}}
        </div>
    </div><!-- Full-width section Ends Here -->
</section><!-- **Primary Ends Here** -->

@endsection
