@extends('layouts.app')

@section('parallax')
<div class="slider-container">
    <div class="slider fullwidth-section parallax"></div>
</div>
@endsection

@section('content')
<section id="primary" class="content-full-width"> <!-- **Primary Starts Here** -->

    <div class="dt-sc-hr-invisible-small"></div>

    <div class="fullwidth-section"> <!-- **Full-width-section Starts Here** -->
        <div class="container">
            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h2 class="aligncenter"> Arts </h2>
                <p> {{ trans("owner.art-sub-title") }} </p>
            </div>
        </div>
        {{--<div class="dt-sc-sorting-container">
            <a data-filter="*" href="#" title = "09" class="dt-sc-tooltip-top active-sort type1 dt-sc-button animate" data-animation="fadeIn" data-delay="100">All</a>
            <a data-filter=".nature" href="#" title = "06" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="200">Nature</a>
            <a data-filter=".people" href="#" title = "06" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="300">People</a>
            <a data-filter=".street" href="#" title = "05" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="400">Street</a>
            <a data-filter=".still-life" href="#" title = "08" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="500">Still life</a>
        </div>--}}
        <div class="portfolio-fullwidth">
            <div class="portfolio-grid">
                <div class="dt-sc-portfolio-container isotope"> <!-- **dt-sc-portfolio-container Starts Here** -->
                    @foreach ($class_array as $item)
                        @if ( count($arts) >= $loop->iteration && $arts[$loop->index]->type == "art")
                        @art(['class_title' => $item, 'art' => $arts[$loop->index] ])
                        @endart
                        @endif
                    @endforeach

                </div><!-- **dt-sc-portfolio-container Ends Here** -->


            </div>
        </div>
    </div><!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="fullwidth-section"> <!-- **Full-width-section Starts Here** -->
        <div class="container">
            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h2 class="aligncenter"> Tattoos </h2>
                <p> {{ trans("owner.tattoo-sub-title") }} </p>
            </div>
        </div>
        {{--<div class="dt-sc-sorting-container">
            <a data-filter="*" href="#" title = "09" class="dt-sc-tooltip-top active-sort type1 dt-sc-button animate" data-animation="fadeIn" data-delay="100">All</a>
            <a data-filter=".nature" href="#" title = "06" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="200">Nature</a>
            <a data-filter=".people" href="#" title = "06" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="300">People</a>
            <a data-filter=".street" href="#" title = "05" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="400">Street</a>
            <a data-filter=".still-life" href="#" title = "08" class="dt-sc-tooltip-top type1 dt-sc-button animate" data-animation="fadeIn" data-delay="500">Still life</a>
        </div>--}}
        <div class="portfolio-fullwidth">
            <div class="portfolio-grid">
                <div class="dt-sc-portfolio-container isotope"> <!-- **dt-sc-portfolio-container Starts Here** -->
                    @foreach ($class_array as $item)
                        @if ( count($arts) >= $loop->iteration && $arts[$loop->index]->type == "tattoo")
                            @art([
                            'class_title' => $item,
                            'art' => $arts[$loop->index]
                            ])
                            @endart
                        @endif
                    @endforeach
                </div><!-- **dt-sc-portfolio-container Ends Here** -->
            </div>
        </div>
    </div><!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="container">
        <div class="main-title animate" data-animation="pullDown" data-delay="100">
            <h2 class="aligncenter"> Events </h2>
            <p> {{ trans("owner.event-sub-title") }} </p>
        </div>
    </div>
    <div class="fullwidth-section"><!-- **Full-width-section Starts Here** -->
        @foreach ($position_event as $item)
            @if ( count($events) >= $loop->iteration)
                @event(['position_image' => $item, 'event' => $events[$loop->index] ])
                @endevent
            @endif
        @endforeach

        {{--@if(count($event) > 0)
        @event(['position_image' => 'left', 'event' => $events[0] ])
        @endevent
        @endif
        @event(['position_image' => 'right', 'event' => $events[1] ])
        @endevent
        @event(['position_image' => 'left', 'event' => $events[2] ])
        @endevent
        @event(['position_image' => 'right', 'event' => $events[3] ])
        @endevent--}}
    </div><!-- **Full-width-section Ends Here** -->
    <div class="clear"></div>

    <div class="fullwidth-section"><!-- **Full-width-section Starts Here** -->
        <div class="container">

            <div class="main-title animate" data-animation="pullDown" data-delay="100">
                <h2 class="aligncenter"> About Me </h2>
                <p> {{ trans("owner.about-sub-title") }} </p>
            </div>

            <div class="about-section">

                <div class="dt-sc-one-half column first">
                    <img src="{{ asset('assets/images/new/about.png') }}" title="" alt="">
                </div>

                <div class="dt-sc-one-half column">
                    <h3 class="animate" data-animation="fadeInLeft" data-delay="200"> A Little Intro</h3>
                    <p class="mb-5">{{ trans("owner.about-little-intro") }}</p>
                    <h3 class="animate" data-animation="fadeInLeft" data-delay="300">My Exhibitions</h3>
                    <p>Express your passion</p>
                    {{--<h3 class="animate" data-animation="fadeInLeft" data-delay="400">Newsletter</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>--}}
                    {{--<form method="post" class="mailchimp-form dt-sc-three-fourth" name="frmnewsletter" action="php/subscribe.php">
                        <p class="input-text">
                           <input class="input-field" type="email" name="mc_email" value="" required/>
                           <label class="input-label">
                                    <i class="fa fa-envelope-o icon"></i>
                                    <span class="input-label-content">Mail</span>
                                </label>
                           <input type="submit" name="submit" class="submit" value="Subscribe" />
                        </p>
                    </form>--}}
{{--                    <div id="ajax_subscribe_msg"></div>--}}
                </div>
            </div>
        </div>
    </div><!-- **Full-width-section Ends Here** -->

    <div class="dt-sc-hr-invisible-small"></div>

</section><!-- **Primary Ends Here** -->
@endsection
