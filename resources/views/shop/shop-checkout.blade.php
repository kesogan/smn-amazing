@extends('layouts.app')

@section('content')
@breadcrumb([
    'breadcrumb_title' => "Complet",
    'breadcrumb_title_span' => ""
]);
@endbreadcrumb
<div id="paypal-button-container"></div>

<form action="{{route('paypal.payment.create')}}" method="post">
        @csrf
        {{ method_field('POST') }}
        <input type="hidden" name="cartID" id="cartId" value="{{$cart->id}}">
        <input type="hidden" name="addres" id="addres" value="{{$addres}}">
        <input type="hidden" name="mail" id="mail" value="{{$mail}}">
        <input type="hidden" name="app_OrderID" id="app_OrderID">
    <button type="submit">submit</button>
</form>


{{-- <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png" alt="Pay with PayPal, PayPal Credit or any major credit card" /> --}}

@endsection

@push('script')
<script src="https://www.paypal.com/sdk/js?client-id=AZKSrRYxNIVGmQYv0teiXVVTjmYcLLSyXATGsBOK8Mn8Wwzq4cyBqgITTQzdOPLYlZv9QW8pCpPCWTBN"></script>
<script>
    //  alert(jQuery('#cartId').val());
    //  alert(jQuery('#addres').val());
        // alert('createc : '+jQuery('#createOrder').val()+' & get : '+jQuery('#getOrder').val());
    paypal.Buttons({
        createOrder: function() {
            return fetch("{{route('paypal.payment.create')}}", {
                method: 'POST',
                headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
                'content-type': 'application/json'
                },
                body: JSON.stringify({
                cartID: jQuery('#cartId').val(),
                addres: jQuery('#addres').val()
                })
            }).then(function(res) {
                return res.json();
            }).then(function(data) {
                // alert(data.data.id);
                // alert(data.data.order_id);
                jQuery('#app_OrderID').val(data.data.id);
                return data.data.order_id; // Use the same key name for order ID on the client and server
            });
        },
        onApprove: function(data) {
            //alert('data : '+data.orderID);
            return fetch("{{route('paypal.payment.success')}}", {
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                orderID: data.orderID,
                app_orderID: jQuery('#app_OrderID').val()
                })
            }).then(function(res) {
                return res.json();
            }).then(function(details) {
                alert('Transaction approved by ' + details.data.full_name_bill+" an email containing the bill as attachment has been sent");
                //details.payer_given_name
            });
        }
    }).render('#paypal-button-container');

</script>
@endpush
