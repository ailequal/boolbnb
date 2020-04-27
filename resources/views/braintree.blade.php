<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div id="dropin-wrapper">
  <div id="checkout-message"></div>
  <div id="dropin-container"></div>
    <div>amount <span>{{$promo->price}}</span></div>
    <form action="{{route('brain.store')}}" method="post">
      @csrf
      @method('POST')
      <input type="hidden" name="promo_id" value="{{$promo->id}}">
      <input type="hidden" name="flat_id" value="{{$flat_id}}">
      <input type="submit" value="Submit payment" id="payment">
    </form>
</div>
<script>
  var button = document.querySelector('#submit-button');
  braintree.dropin.create({
      // Insert your tokenization key her
      authorization: 'sandbox_nd4jtq7d_nmzd3r7w98sbx43y',
      container: '#dropin-container'
    },
    function (createErr, instance) {
        button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
      });
    });
  });
</script>
</body>
</html>