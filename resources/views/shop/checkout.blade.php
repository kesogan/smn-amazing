@extends('layouts.app')

@section('content')
@breadcrumb([
    'breadcrumb_title' => "Checkout",
    'breadcrumb_title_span' => ""
]);
@endbreadcrumb
<section id="primary" class="content-full-width">
    <div class="container">
        <!-- **woocommerce - Starts** -->
        <div class="woocommerce">

            <!-- **checkout - Starts** -->
            <form name="checkout" method="post" class="checkout" action="{{route('shop.checkout.complet')}}" id="form">
                    @csrf
                    {{ method_field('POST') }}
                <!-- **col2-set - Starts** -->
                <div class="col2-set" id="customer_details">
                    <!-- **col-1 - Starts** -->
                    <div class="col-1">
                        <!-- **woocommerce-billing-fields - Starts** -->
                        <div class="woocommerce-billing-fields">

                            <h3>Billing Address</h3>

                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field">

                            <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                            <label for="billing_first_name" class="">First Name *</label>
                            <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder=""  value="" required="" /></p>

                            <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                            <label for="billing_last_name" class="">Last Name *</label>
                            <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder=""  value="" required="" /></p>
                            <div class="clear"></div>

                            <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                            <label for="billing_address_1" class="">Address1</label>
                            <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Street Name"  value=""  /></p>

                            <p class="form-row form-row-wide address-field" id="billing_address_2_field">
                            <label for="billing_address_2" class="">Address2</label>
                            <input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment Name, No.. etc."  value=""  /></p>

                            <p class="form-row form-row-first address-field validate-state" id="billing_state_field">
                                <label>Town / City *</label>
                                <input type="text" class="input-text " value="" placeholder="Town / City" name="billing_state"/></p>

                            <p class="form-row form-row-last address-field validate-required validate-postcode" id="billing_postcode_field">
                                <label for="billing_postcode" class="">Postcode *</label>
                                <input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="Postcode / Zip"  value=""  /></p><div class="clear"></div>

                            <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                                <label for="billing_email" class="">Email Address *</label>
                                <input type="text" class="input-text " name="billing_email" id="billing_email" placeholder="Enter email"  value=""  /></p>

                            <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                <label for="billing_phone" class="">Phone * </label>
                                <input type="text" class="input-text " name="billing_phone" id="billing_phone" placeholder="Enter Phone"  value=""  /></p>
                            <div class="clear"></div>

                            <p class="form-row form-row-wide create-account">
                                <input class="input-checkbox" id="createaccount"  type="checkbox" name="createaccount" value="1" />
                                <label for="createaccount" class="checkbox"> <span></span> Create an account?</label>
                            </p>
                        </div> <!-- **woocommerce-billing-fields - Ends** -->
                    </div> <!-- **col-1 - Ends** -->
                    <!-- **col-2 - Starts** -->
                    <div class="col-2">
                        <!-- **woocommerce-shipping-fields - Starts** -->
                        <div class="woocommerce-shipping-fields">
                            <h3>Shipping Address</h3>
                            <p id="ship-to-different-address">
                                <input id="ship-to-different-address-checkbox" class="input-checkbox"  checked='checked' type="checkbox" name="ship_to_different_address" value="1" />
                                <label for="ship-to-different-address-checkbox" class="checkbox"><span></span>Ship to Billing Address</label>

                            </p>
                            <!-- **shipping-address - Starts** -->
                            <div class="shipping_address">

                                <div class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field">
                                <label for="shipping_country" class="">Country *</label>
                                <div class="selection-box">
                                    <select name="shipping_country" id="shipping_country" class="shop-dropdown" >
                                        <option value="-1" selected>Select a country&hellip;</option>
                                        <option value="AL" class="fa fa-tree">Alaska</option>
                                        <option value="AF" class="fa fa-train">Afghanistan</option>
                                        <option value="AL" class="fa fa-plane">Albania</option>
                                        <option value="DZ" class="fa fa-subway">Algeria</option>
                                        <option value="AQ" class="fa fa-ship">Antarctica</option>
                                    </select>
                                </div>

                                <noscript><input type="submit" name="woocommerce_checkout_update_totals" value="Update country" /></noscript></div>

                                <p class="form-row form-row-first validate-required" id="shipping_first_name_field"><label for="shipping_first_name" class="">First Name *</label><input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder=""  value=""  /></p>

                                <p class="form-row form-row-last validate-required" id="shipping_last_name_field"><label for="shipping_last_name" class="">Last Name *</label><input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder=""  value=""  /></p><div class="clear"></div>

                                <p class="form-row form-row-wide" id="shipping_company_field"><label for="shipping_company" class="">Company Name</label><input type="text" class="input-text " name="shipping_company" id="shipping_company" placeholder=""  value=""  /></p>

                                <p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field"><label for="shipping_address_1" class="">Address 1</label><input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="Street Name"  value=""  /></p>

                                <p class="form-row form-row-wide address-field" id="shipping_address_2_field"><label for="shipping_address_2" class="">Address 2</label><input type="text" class="input-text" name="shipping_address_2" id="shipping_address_2" placeholder="Apartment Name, No.. etc"  value=""  /></p>

                                <p class="form-row form-row-wide address-field validate-state" id="shipping_state_field"><label for="shipping_state" class="">County </label><input type="text" class="input-text " name=" shipping_state" placeholder="State / County"  value="" id="shipping_state"  /></p>

                                <p class="form-row form-row-first address-field validate-required" id="shipping_city_field"><label>Town / City *</label><input type="text" class="input-text " value=""  placeholder="Town / City" name="shipping_state" /></p>

                                <p class="form-row form-row-last address-field validate-required validate-postcode" id="shipping_postcode_field">
                                <label for="shipping_postcode" class="">Postcode *</label>
                                <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / Zip"  value=""  /></p>
                                <div class="clear"></div>

                            </div> <!-- **shipping_address - Ends** -->

                            <p class="form-row notes" id="order_comments_field"><label for="order_comments" class="">Optional Message</label><textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea></p>

                        </div> <!-- **woocommerce-shipping-fields - Ends** -->

                    </div> <!-- **col-2 - Ends** -->

                </div> <!-- **col2-set - Ends** -->

                <div class="dt-sc-margin50"></div>
                <h3 id="order_review_heading">Order Review &amp; Payment</h3>
                <div id="order_review">
                    <table class="shop_table cart">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-subtotal">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->cart_items()->doesntHave('order')->get() as $cart_item)
                            @unless ($cart_item->art == null)
                                <tr class = "cart_table_item" id="cart_table_item-{{ $cart_item->price }}">
                                    <!-- The thumbnail -->
                                    <td class="product-thumbnail">
                                    <a href="shop-detail.html"><img src="{{ $cart_item->art->images[0]->image_src }}" class="attachment-shop_thumbnail wp-post-image" alt="{{ $cart_item->art->images[0]->alt }}" /></a>
                                    </td>

                                    <!-- Product Name -->
                                    <td class="product-name">
                                        <h6><a href="shop-detail.html">{{ $cart_item->art->name }}</a></h6>
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

                    <!-- **cart-collaterals - Starts** -->
                    <div class="cart-collaterals">
                        {{--<div class="coupon">
                            <h3>Coupon</h3>
                            <form action="#" method="post">
                                <label for="coupon_code">Enter Coupon Code</label>
                                <input name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Enter Code" />
                                <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                            </form>
                        </div>--}}
                        <div class="cart_totals">
                            <h3>Cart Totals</h3>
                            <table>
                                <tbody>

                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                    <td><span class="amount subtotal-quantity"><i class="fa fa-dollar"></i> {{ $cart->total }} </span></span></td>
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
                            {{-- <a class="dt-sc-button medium type2 with-icon" href="{{route('shop.checkout.complet')}}"> --}}
                                <button class="dt-sc-button medium type2 with-icon" style="border: 0px; margin: 0px;">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span id="proceed"> Proceed to Checkout </span>
                                </button>
                            {{-- </a> --}}
                            <input type="hidden" name="cart-total" id="cart-total" value="{{ $cart->total }}">
                        </div>
                    </div> <!-- **cart-collaterals - Ends** -->
                    <!-- **payment - Starts** -->
                    {{-- <div id="payment">
                        <ul class="payment_methods methods">
                            <li class="payment_method_bacs">
                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs"  checked='checked' data-order_button_text="" />
                                <label for="payment_method_bacs"><span></span>Direct Bank Transfer </label>
                                <div class="payment_box payment_method_bacs" ><p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won&#8217;t be shipped until the funds have cleared in our account.</p> </div>
                            </li>
                            <li class="payment_method_cheque">
                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque"  data-order_button_text="" />
                                <label for="payment_method_cheque"><span></span>Cheque Payment </label>
                                <div class="payment_box payment_method_cheque" style="display:none;"><p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p> </div>
                            </li>
                            <li class="payment_method_paypal">
                                <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal"  data-order_button_text="Proceed to PayPal" />
                                <label for="payment_method_paypal"><span></span>PayPal <img src="images/paypal.png" alt="PayPal" /></label>
                                <div class="payment_box payment_method_paypal" style="display:none;"><p>Pay via PayPal; you can pay with your credit card if you don&#8217;t have a PayPal account</p> </div>
                            </li>
                        </ul>

                        <div class="clear"></div>

                    </div>  <!-- **payment - Ends** --> --}}
                </div> <!-- **order_review - Ends** -->
            </form> <!-- **checkout - Ends** -->
        </div> <!-- **woocommerce - Ends** -->
    </div>
</section> <!-- **Primary - Ends** -->

@endsection

@push('script')
<script>
    jQuery(document).ready(function(jQuery){
        cartInitializer();
        // jQuery('#proceed').click(function(e){
        //     e.preventDefault();
        //     var r=jQuery('#form').serialize();
        //     alert(r);
        //     //jQuery(".woocommerce").hide();JSON.parse(jQuery('form'))
        // });
        //jQuery(".woocommerce").hide();
        function removeCartItem(element, elementToRemove) {
            let id = element.id;
            jQuery.ajax({
                //type of submit
                type: 'DELETE',
                url: element.dataset.url,
                // Function to be exceuted in case of successfulled operation
                success: function success(data) {
                    console.log("Here is the response"); // and when you done:
                    // setTimeout(function () {
                    if(data['status'] == true) {
                        window.location.href = "{{ route('shop.checkout') }}";

                        success_flash('The art was successfully deleted into your cart', 1000);
                    }
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
