jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

function refreshInput(element, quantity, items_number, total, subtotal) {
    element.val(quantity);
    let subtotalArr = jQuery(".subtotal-quantity");
    for (let i = 0; i < subtotalArr.length; i++) {
        jQuery(subtotalArr[i]).text(subtotal);
    }
    let totalArr = jQuery(".total-quantity");
    // for (let i = 0; i < totalArr.length; i++) {
    for (let item in Object.keys(totalArr).filter( a => /\d/.test(a) == true)) {
        let itemJQ = jQuery("#"+totalArr[item].id);

        if(totalArr[item].id.split('-')[3] === element.attr("id").split('-')[3]) itemJQ.html('<i class="fa fa-gbp"></i> ' + total);
    }

    jQuery("#cart-count-items").html("Shopping Bag: "+items_number+" items");
    jQuery("#cart-count-subtotal").html("($ "+subtotal+" )");
}
