@extends('layouts.app')

@section('content')
@breadcrumb([
    'breadcrumb_title' => "Shop",
    'breadcrumb_title_span' => ""
]);
@endbreadcrumb
<section id="primary" class="content-full-width"><!-- **Primary Starts Here** -->
    <div class="container" id="data-refresh">
        <div class="woocommerce">
            <form action="#" method="post">
                <table class="shop_table cart">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->cart_items()->doesntHave('order')->get() as $cart_item)
                        @unless ($cart_item->art == null)
                            <tr class = "cart_table_item" id="cart_table_item-{{ $cart_item->price }}">
                                <!-- The thumbnail -->
                                <td class="product-thumbnail">
                                <a href="{{ route('art.show', ['id' => $cart_item->art->id ]) }}"><img src="{{ $cart_item->art->images[0]->image_src }}" class="attachment-shop_thumbnail wp-post-image" alt="{{ $cart_item->art->images[0]->alt }}" /></a>
                                </td>

                                <!-- Product Name -->
                                <td class="product-name">
                                    <h6><a href="{{ route('art.show', ['id' => $cart_item->art->id ]) }}">{{ $cart_item->art->name }}</a></h6>
                                </td>

                                <!-- Product price -->
                                <td class="product-price">
                                    <span class="amount"><i class="fa fa-gbp"></i> {{ $cart_item->price }}</span>
                                </td>

                                <!-- Quantity inputs -->
                                <td class="product-quantity">
                                    <div class="quantity">
                                    <input type="button" data-id="{{ $cart_item->id }}" class="minus modify-quantity" value="-"/>
                                    <input type="number" data-url="{{ route('shop.update-cart-item') }}" name="quantity" step="1" value="{{ $cart_item->quantity }}" min="1" title="Qty" class="input-text qty text"  id="cart-item-quantity-{{ $cart_item->id }}"/>
                                        <input type="button" data-id="{{ $cart_item->id }}" class="plus modify-quantity" value="+" />
                                    </div>
                                </td>

                                <!-- Product subtotal -->
                                <td class="product-subtotal">
                                    <span class="amount total-quantity" id="cart-item-total-{{ $cart_item->id }}"><i class="fa fa-gbp"></i> {{ $cart_item->total }}</span>
                                </td>

                                <!-- Remove from cart link -->
                                <td class="product-remove">
                                <a href="#" data-id="{{ $cart_item->id }}" data-remove="yes" class="remove-cart-item remove" id="remove-{{ $cart_item->id }}" data-url="{{ route('shop.remove-cart-item', ['idCartItem' => $cart_item->id]) }}" title="Remove this item">&times;</a>
                                </td>
                            </tr>
                            @endunless
                        @endforeach
                    </tbody>
                </table>
                {{-- <input type="submit" class="button" name="update_cart" value="Update Cart"> --}}
                <a class="dt-sc-button small type3 with-icon prev-post" href="{{ route('shop.checkout') }}"> <i class="fa fa-shopping-cart"> </i> <span> Checkout </span> </a>
                {{-- <input type="submit" class="button" name="continue" value="Continue Shopping"> --}}
            <a class="dt-sc-button small type3 with-icon next-post" href="{{ route('home') }}"> <span> Continue Shopping </span> <i class="fa fa-hand-o-left"> </i> </a>
            </form>
            <div class="cart-collaterals">
                <div class="coupon">
                    <h3>Coupon</h3>
                    <form action="#" method="post">
                        <label for="coupon_code">Enter Coupon Code</label>
                        <input name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Enter Code" />
                        <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                    </form>
                </div>
                <div class="cart_totals">
                    <h3>Cart Totals</h3>
                    <table>
                        <tbody>

                            <tr class="cart-subtotal">
                                <th>Cart Subtotal</th>
                            <td><span class="amount subtotal-quantity"><i class="fa fa-dollar"></i> {{ $cart->total }} </span></td>
                            </tr>

                            <tr class="shipping">
                                <th>Shipping</th>
                                <td>Free Shipping<input type="hidden" name="shipping_method" id="shipping_method" value="free_shipping" /></td>
                            </tr>

                            <tr class="total">
                                <th>Order Price Total</th>
                                <td><strong><span class="amount subtotal-quantity"><i class="fa fa-dollar"></i> {{ $cart->total }}</span></span></strong></td>
                            </tr>

                        </tbody>
                    </table>
                    <a class="dt-sc-button medium type2 with-icon" href="{{ route('shop.checkout') }}"><i class="fa fa-shopping-cart"></i> <span> Proceed to Checkout </span> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="dt-sc-hr-invisible-small"></div>
</section><!-- **Primary Ends Here** -->

@endsection

@push('script')
<script>
    jQuery(document).ready(function(jQuery){
        cartInitializer();
        // jQuery(".woocommerce").hide();
        function removeCartItem(element, elementToRemove) {
            let id = element.id;
            jQuery.ajax({
                //type of submit
                type: 'DELETE',
                url: element.dataset.url,
                // Function to be exceuted in case of successfulled operation
                success: function success(data) {
                    console.log("Here is the response"); // and when you done:
                    console.log(data);

                    if(data['status'] == true) {
                        success_flash('The art was successfully deleted into your cart', 800);
                        setTimeout(function () {
                            window.location.href = "{{ route('shop.detail') }}";
                        }, 1000);
                    } else error_flash('Something went wrong please try later');
                },
                // Function to be exceuted in case of failed operation
                error: function error(error) {
                    error_flash('Something went wrong please try later');
                    console.log(error.status);
                }
            });
        }



        function cartInitializer() {
            jQuery('.remove-cart-item').on("click", function(event){
                event.preventDefault();
                removeCartItem(event.currentTarget, jQuery("#cart_table_item-"+event.currentTarget.dataset.id));
            });
            jQuery('.modify-quantity').on("click", function(event){
                event.preventDefault();
                let targetId = "cart-item-quantity-"+event.currentTarget.dataset.id;
                let data = {};
                let HTMLTarget = document.getElementById(targetId);
                // let HTMLTarget = event.currentTarget;
                // console.log(HTMLTarget);
                if(Object.values(event.currentTarget.classList).includes("plus")) {
                    data = {
                        isQuantity: true,
                        isUpQuantity: true,
                        quantity: HTMLTarget.value,
                        idCartItem: event.currentTarget.dataset.id
                    };
                } else {
                    data = {
                        isQuantity: true,
                        isUpQuantity: false,
                        quantity: HTMLTarget.value,
                        idCartItem: event.currentTarget.dataset.id
                    };
                }

                jQuery.ajax({
                    //type of submit
                    type: 'POST',
                    url: HTMLTarget.dataset.url,
                    data: data,
                    // Function to be exceuted in case of successfulled operation
                    success: function success(data) {
                        console.log("Here is the response"); // and when you done:
                        console.log(data);
                        // console.log(data);
                        refreshInput(jQuery("#"+targetId),
                        data["quantity"], data['items_number'], data["total"], data["subtotal"]);
                        success_flash('The art was successfully updated into your cart', 800);
                    },
                    // Function to be exceuted in case of failed operation
                    error: function error(error) {
                        error_flash('Something went wrong please try later');
                        console.log(error.status);
                    }
                });
            });
        }
    });
</script>
@endpush
