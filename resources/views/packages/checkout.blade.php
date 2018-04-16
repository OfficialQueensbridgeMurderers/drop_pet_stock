@extends('layouts.header_footer')

@section('content')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                  <form method="get" action="">
                    Country :<br>
                    Canada <input type="radio" name="country" value="can" checked><br>
                    U.S.A <input type="radio" name="country" value="usa"><br>
                    Other <input type="radio" name="country" value="usa"><br><br>
                    Province : <input type="text" name="address"><br><br>
                    City : <input type="text" name="address"><br><br>
                    Postal code : <input type="text" name="address"><br><br>
                    Address : <input type="text" name="address"><br><br>

                    <a style="font-size: 200%">Delivery box review :</a>
                    <table style="width:40%">
                    @foreach ($customPackages as $package)
                    @if ($package->is_activated && count($package->items) != 0)
                    <tr>
                      <th>Package : {{ $package->name }}</th>
                      <th>-</th>
                      <th>-</th>
                    </tr>
                    <tr>
                      <th>Items :</th>
                      <th>Quantity :</th>
                      <th>Price :</th>
                    </tr>
                    @foreach ($package->items as $item)
                    <tr>
                      <td>{{ $item->produit->nom }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td>{{ $item->produit->prix_vente }} $</td>
                    </tr>
                    @endforeach
                    @endif
                    @endforeach
                    @foreach ($userPackages as $package)
                    <tr>
                      <th>Package : {{ $package->package->name }}</th>
                      <th>-</th>
                      <th>-</th>
                    </tr>
                    <tr>
                      <th>Items :</th>
                      <th>Quantity :</th>
                      <th>Price :</th>
                    </tr>
                    @foreach ($package->package->items as $item)
                    <tr>
                      <td>{{ $item->produit->nom }}</td>
                      <td>{{ $item->quantity }}</td>
                      <td>{{ $item->produit->prix_vente }} $</td>
                    </tr>
                    @endforeach
                    @endforeach
                    <tr>
                      <td><br>
                        Subtotal : {{ $produits }} $<br>
                        Delivery fee : {{ $livraison }} $<br>
                        <b>Total : {{ $total }} $</b></td>
                    </tr>
                  </table>
                    <br>
                  </form>
                </div>
            </div>
            <div id="paypal-button-container"></div>
        </div>
    </div>
</div>




<script>

    // Render the PayPal button

    paypal.Button.render({

        // Set your environment

        env: 'production', // sandbox | production

        // Specify the style of the button

        style: {
            label: 'pay',
            size:  'medium', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AVPmhEbwwz-OJIXfZFkrZRaaAyR8IIxIoZ3ahV5flQcFzWrI9_2EtHaFL8GFhDd4jxSD3vEK-37VVowg',
            production: 'AVPmhEbwwz-OJIXfZFkrZRaaAyR8IIxIoZ3ahV5flQcFzWrI9_2EtHaFL8GFhDd4jxSD3vEK-37VVowg'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '0.01', currency: 'CAN' }
                        }
                    ]
                }
            }).then(function() {
                window.location.replace("/packages/bill");
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.location.replace("/packages/bill");
            });
        }

    }, '#paypal-button-container');

</script>
@endsection
