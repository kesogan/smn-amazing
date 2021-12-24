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
            @php
                $i = 1;
            @endphp
            @foreach ($cart->cart_items as $cart_item)
            @unless ($cart_item->art == null || $i == 2)
                <tr class = "cart_table_item" id="cart_table_item-{{ $cart_item->price }}">
                    <!-- The thumbnail -->
                    <td class="product-thumbnail">
                    <a href="shop-detail.html"><img src="{{ $cart_item->art->images[0]->image_src }}" class="attachment-shop_thumbnail wp-post-image" alt="{{ $cart_item->art->images[0]->alt }}" /></a>
                    </td>

                    <!-- Product Name -->
                    <td class="product-name">
                        <h6><a href="shop-detail.html">{{ $cart_item->art->name }}</a></h6>
                    </td>
                    @php
                        $i = 2;
                    @endphp
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
                        <span class="amount total-quantity"><i class="fa fa-gbp"></i> {{ $cart_item->total }}</span>
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
    <a class="dt-sc-button small type3 with-icon prev-post" href="#"> <i class="fa fa-shopping-cart"> </i> <span> Checkout </span> </a> 
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
        <a class="dt-sc-button medium type2 with-icon" href="shop-checkout.html"><i class="fa fa-shopping-cart"></i> <span> Proceed to Checkout </span> </a>                                                                
    </div>                        	
</div>