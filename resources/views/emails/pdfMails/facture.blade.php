<br/>
<label for="noms">Noms et Prenoms : {{$order->full_name_bill}}</label><br/>
<label for="Tel">Tel : {{$order->tel_on_bill}}</label><br/>
<label for="mail">Mail : {{$order->mail_on_bill}}</label><br/><br/>
<table id="table" class="table table-striped table-sm bordered table-hover table-responsuve">
    <caption>
        <h2>
            INFORMATION SUR LA COMMANDE
        </h2>
    </caption><br/><br/>
    <caption><h3>Liste Des Produits</h3></caption>
    <thead>

        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->cart_items as $cart_item)
            @unless ($cart_item->art == null)
                <tr>
                    <td>{{$cart_item->art->name}}</td>
                    <td>{{$cart_item->art->price}}</td>
                    <td><center>{{$cart_item->quantity}}</center></td>
                    <td><center>{{$cart_item->total}}</center></td>
                </tr>
            @endunless
        @endforeach

        <tr>
            <td>Total</td>
        <td>{{$order->total}}</td>
        </tr>
        <tr>
            <td>Mode de Paiement : </td>
            <td> {{$order->used_api}}</td>
        </tr>
        <tr>
            <td>Etat de Paiement : </td>
            <td>{{$order->status}}</td>
        </tr>
        <tr>
            <td>Mode de livreson : </td>
            <td>
                @if ($order->shipping)
                    By Ship
                @else
                    By Mail
                @endif
            </td>
        </tr>
        <tr>
            <td>Etat de livraison : </td>
            <td>en cours</td>
        </tr>
    </tbody>
</table>
