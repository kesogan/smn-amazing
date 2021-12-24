@extends('layouts.app')

@section('content')
@if($art->type == "art")
    @breadcrumb([
        'breadcrumb_title' => "Art",
        'breadcrumb_title_span' => "Detail"
    ]);
    @endbreadcrumb
@else
    @breadcrumb([
    'breadcrumb_title' => "Tattoo",
    'breadcrumb_title_span' => "Detail"
    ]);
    @endbreadcrumb
@endif
<div class="container">
    <div class="main-title animate" data-animation="pullDown" data-delay="100">
    <h3>{{ $art->name }}</h3>
    </div>
    <section id="secondary" class="secondary-sidebar secondary-has-left-sidebar"><!-- **Secondary Starts Here** -->
        <aside class="widget widget_search">
            <div class="widgettitle sub-title">
                <h3>It is nice right ?</h3>
            </div>
        <a class="dt-sc-button large type3 with-icon" id="addCartItemButton" data-url="{{ route('shop.add-cart-item') }}" href="#"><i class="fa fa-shopping-cart"></i><span>Add to the cart</span></a>
            <div id="ajax_subscribe_msg"></div>
        </aside>
        {{-- <aside class="widget widget_categories">
            <div class="widgettitle sub-title">
                <h3> Categories </h3>
            </div>
            <ul>
                <li class="cat-item"><a title="#" href="#">Corporate<span> 2</span></a></li>
                <li class="cat-item"><a title="#" href="#">Design<span> 3</span></a></li>
                <li class="cat-item"><a title="#" href="#">Learning<span> 2</span></a></li>
                <li class="cat-item"><a title="#" href="#">Tools<span> 1</span></a></li>
                <li class="cat-item"><a title="#" href="#">Training<span> 3</span></a></li>
            </ul>
        </aside> --}}
        <div class="project-details">
            <ul class="client-details" style="padding-left: 0px;">
                <li><p><span>Price :</span>$ {{ $art->price }}</p></li>
                <li><p><span>Quantity :</span>{{ $art->quantity }}</p></li>
                <li><p><span>Time :</span>{{ dateDiff($art->start_at, $art->end_at) }}</p></li>
                <li><p><span>technique :</span>{{ showTabDetail($art->techniques) }}</p></li>
                <li><p><span>Equipment :</span>{{ showTabDetail($art->equipments) }}</p></li>
                <li><p><span>Support :</span>{{ showTabDetail($art->supports) }}</p></li>
            </ul>
        </div>

        {{-- <aside class="widget widget_popular_entries">
            <div class="widgettitle sub-title">
                <h3> Latest Gallery</h3>
            </div>
            <div class="recent-gallery-widget">
                <ul>
                    <li>
                        <a class="entry-thumb" href="#"><img alt="Enjoy Life with Family" src="http://placehold.it/955x470&text=Portfolio+Image"></a>
                        <h5><a href="#"> Cowboy of Timberland </a></h5>
                        <p>Vivamus ullamcorper, enim at varius molestie, nunc libero pulvinar sapien, quis fringilla purus mi vitae tellus.</p>
                    </li>
                </ul>
            </div>
        </aside> --}}
        {{-- <aside class="widget widget_tag_cloud">
            <div class="widgettitle sub-title">
                <h3> Tags </h3>
            </div>
            <div class="tagcloud type3">
                <a title="1 topic" href="#">Sketch</a>
                <a title="1 topic" href="#">Oil color</a>
                <a title="1 topic" href="#">Acrylic</a>
                <a title="1 topic" href="#">Sculpture</a>
                <a title="1 topic" href="#">Crayons</a>
                <a title="1 topic" href="#">Art</a>
            </div>
        </aside>                                                                           	 --}}
    </section><!-- **Secondary Ends Here** -->
    <section id="primary" class="with-sidebar with-left-sidebar">
        <article>
            <div class="dt-sc-one-column column first">
                <div class="recent-gallery-container">
                    <ul class="recent-gallery">
                        @foreach ($art->images as $art_image)
                        <li> <img src="{{ $art_image->image_src }}" alt="{{ $art_image->alt }}"/> </li>
                        @endforeach
                    </ul>
                    {{-- <div id="bx-pager">
                        <a href="#" data-slide-index='0'><img src='http://placehold.it/1920x800&text=Service+Thumb+1/000000' alt='image' /></a>
                        <a href="#" data-slide-index='1'><img src='http://placehold.it/1920x800&text=Service+Thumb+2/000000' alt='image' /></a>
                        <a href="#" data-slide-index='2'><img src='http://placehold.it/1920x800&text=Service+Thumb+3/000000' alt='image' /></a>
                        <a href="#" data-slide-index='3'><img src='http://placehold.it/1920x800&text=Service+Thumb+4/000000' alt='image' /></a>
                    </div>                            	 --}}
                </div>
            </div>
            <div class="dt-sc-hr-invisible-small"> </div>
            <div class="dt-sc-two-third column first animate" data-animation="fadeInLeft" data-delay="100">
                <h3>{{ $art->name }}</h3>
                <p>{{ $art->description }}</p>
            </div>
            {{-- <div class="dt-sc-one-third column animate" data-animation="fadeInRight" data-delay="100">
                <div class="dt-sc-project-details">
                    <h5>Other Details</h5>
                    <div class="enquiry-details">
                        <p> <i class="fa fa-cab"></i> 121 King St, Melbourne VIC 3, Australia </p>
                        <p><i class="fa fa-mortar-board"></i> Stephen Jones</p>
                        <p><i class="fa fa-wrench"></i> Crayons, Sketch, Scissors</p>
                        <p> <i class="fa fa-tags"></i> Arcrylic, Sculpture, Canvas</p>
                        <p> <i class="fa fa-globe"></i> <a href="#"> envato.com </a> </p>
                    </div>
                    <h5>Social Sharing</h5>
                    <ul class="type3 dt-sc-social-icons">
                        <li class="twitter"><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                        <li class="facebook"><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                        <li class="google"><a href="#"> <i class="fa fa-google"></i> </a></li>
                        <li class="dribbble"><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                    </ul>
                </div>
            </div>
            <div class="dt-sc-post-pagination">
                <a class="dt-sc-button small type3 with-icon prev-post" href="#"> <span> Previous Post </span> <i class="fa fa-hand-o-left"> </i> </a>
                <a class="dt-sc-button small type3 with-icon next-post" href="#"><i class="fa fa-hand-o-right"> </i>  <span> Next Post </span> </a>
            </div>                         --}}
        </article>
    </section>
    <div class="dt-sc-hr-invisible-small"></div>
</div><!-- **Container Ends Here** -->
@if($art->type == "art")
    <div class="container">
        <div class="main-title animate" data-animation="pullDown" data-delay="100">
            <h3> Related Art </h3>
        </div>
    </div>
    @related_art(['related_arts' => $related_arts, 'type' => 'art'])
    @endrelated_art
@else
    <div class="container">
        <div class="main-title animate" data-animation="pullDown" data-delay="100">
            <h3> Related Tattoo </h3>
        </div>
    </div>
    @related_art(['related_arts' => $related_arts, 'type' => 'tattoo'])
    @endrelated_art
@endif

@endsection

@push('script')
<script>
    jQuery(document).ready(function(jQuery){
        jQuery("#addCartItemButton").on("click", function(event){
            jQuery(".loader-wrapper").fadeIn(500);

            event.preventDefault();

            jQuery.ajax({
                //type of submit
                type: 'POST',
                url: jQuery(this).data('url'),
                // data to be sent
                data: {
                    idArt: {{ $art->id }},
                    price: {{ $art->price }},
                    quantity: {{ $art->quantity }}
                },
                // Function to be exceuted in case of successfulled operation
                success: function success(data) {
                    console.log("Here is the response" + data); // and when you done:
                    jQuery(".loader-wrapper").fadeOut(500);
                    if(data.status === true) {
                        jQuery("#cart-count-items").html("Shopping Bag: "+data["items_number"]+" items");
                        jQuery("#cart-count-subtotal").html("($ "+data["subtotal"]+" )");
                        success_flash('The art was successfully added into your cart');
                    } else {
                        error_flash('The art was not added into your cart because an error occur');
                    }
                },
                // Function to be exceuted in case of failed operation
                error: function error(error) {
                    jQuery(".loader-wrapper").fadeOut(500);
                    notification('An error occur please try later', 'error', 8000);
                    console.log(error.status);
                }
            });
        });
    });
</script>
@endpush
