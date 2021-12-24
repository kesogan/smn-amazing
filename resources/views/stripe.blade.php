@extends('layouts.app')

@section('content')

{{-- <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style> --}}

<div class="container">

    <h1>Laravel 5 - Stripe Payment Gateway Integration Example <br/> ItSolutionStuff.com</h1>
    <div id="paypal-button-container"></div>
    {{-- <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                            data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (jQuery100)</button>
                            </div>
                        </div>
                        <input type="hidden" name="" id="createOrder" value="{{route('paypal.payment.create')}}">
                        <input type="hidden" name="" id="getOrder" value="{{url('/paypal/payment/success')}}">

                    </form>
                </div>
            </div>
        </div>
    </div> --}}

</div>

@endsection

{{-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> --}}
<script src="https://www.paypal.com/sdk/js?client-id=AZKSrRYxNIVGmQYv0teiXVVTjmYcLLSyXATGsBOK8Mn8Wwzq4cyBqgITTQzdOPLYlZv9QW8pCpPCWTBN"></script>
@push('script')
<script type="text/javascript">
jQuery(function() {
//     var jQueryform = jQuery(".require-validation");
//   jQuery('form.require-validation').bind('submit', function(e) {
//     var jQueryform  = jQuery(".require-validation"),
//         inputSelector = ['input[type=email]', 'input[type=password]',
//                          'input[type=text]', 'input[type=file]',
//                          'textarea'].join(', '),
//         jQueryinputs       = jQueryform.find('.required').find(inputSelector),
//         jQueryerrorMessage = jQueryform.find('div.error'),
//         valid = true;
//         jQueryerrorMessage.addClass('hide');

//         jQuery('.has-error').removeClass('has-error');
//     jQueryinputs.each(function(i, el) {
//       var jQueryinput = jQuery(el);
//       if (jQueryinput.val() === '') {
//         jQueryinput.parent().addClass('has-error');
//         jQueryerrorMessage.removeClass('hide');
//         e.preventDefault();
//       }
//     });

//     if (!jQueryform.data('cc-on-file')) {
//       e.preventDefault();
//       Stripe.setPublishableKey(jQueryform.data('stripe-publishable-key'));
//       Stripe.createToken({
//         number: jQuery('.card-number').val(),
//         cvc: jQuery('.card-cvc').val(),
//         exp_month: jQuery('.card-expiry-month').val(),
//         exp_year: jQuery('.card-expiry-year').val()
//       }, stripeResponseHandler);
//     }

//   });

//   function stripeResponseHandler(status, response) {
//         if (response.error) {
//             jQuery('.error')
//                 .removeClass('hide')
//                 .find('.alert')
//                 .text(response.error.message);
//         } else {
//             // token contains id, last4, and card type
//             var token = response['id'];
//             // insert the token into the form so it gets submitted to the server
//             jQueryform.find('input[type=text]').empty();
//             alert(token);
//             jQueryform.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
//             jQueryform.get(0).submit();
//         }
//     }

//var r="{{route('paypal.payment.create')}}";
//alert(r);
    paypal.Buttons({
    createOrder: function() {
    return fetch("{{route('paypal.payment.create')}}", {
        method: 'GET',
        headers: {
       //  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
        'content-type': 'application/json'
        }
    }).then(function(res) {
       return res.json();
    }).then(function(data) {
        return data.data.order_id; // Use the same key name for order ID on the client and server
    });
   }
  }).render('#paypal-button-container');

});
</script>
@endpush
