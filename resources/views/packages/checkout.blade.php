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

                    Delivery box review :
                    <table style="width:100%">
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Age</th>
                    </tr>
                    <tr>
                      <td>Jill</td>
                      <td>Smith</td>
                      <td>50</td>
                    </tr>
                    <tr>
                      <td>Eve</td>
                      <td>Jackson</td>
                      <td>94</td>
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
            size:  'small', // small | medium | large | responsive
            shape: 'rect',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: '<insert production client id>'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '0.01', currency: 'USD' }
                        }
                    ]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');

</script>
@endsection
