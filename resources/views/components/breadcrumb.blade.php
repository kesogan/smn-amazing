<div class="breadcrumb"><!-- *BreadCrumb Starts here** -->
    <div class="container">
    <h2>{{ $breadcrumb_title }} <span>{{ $breadcrumb_title_span }} </span></h2>
        <div class="user-summary">
            <div class="account-links">
                {{-- <a href="#">My Account</a> --}}
                <a href="{{ route('shop.detail') }}"> <i class="fa fa-shopping-cart"> </i> Checkout</a>
            </div>
            @auth
            <div class="cart-count">
                <a href="{{ route('shop.detail') }}" id="cart-count-items">Shopping Bag: {{ auth()->user()->cart->cart_items()->doesntHave('order')->get()->count() }} items</a>
                <a href="{{ route('shop.detail') }}" id="cart-count-subtotal">($ {{ auth()->user()->cart->total }} )</a>
            </div>
            {{-- <div class="cart-count">
                <a href="{{ route('shop.detail') }}">Shopping Bag: {{ $cart->cart_items()->count() }} items</a>
                <a href="{{ route('shop.detail') }}" class="subtotal-quantity">($ {{ $cart->total }} )</a>
            </div> --}}
            @endauth
        </div>
    </div>
</div><!-- *BreadCrumb Ends here** -->
