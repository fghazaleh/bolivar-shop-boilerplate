<div class="heading">
    <h3><i class="fa fa-money"></i> Payment method</h3>
</div>
<div id="paymentPlaceholder">Please wait, Loading...</div>
@section('script')
    <script src="https://js.braintreegateway.com/js/braintree-2.32.0.min.js"></script>
    <script src="{{asset('js/payment.js')}}"></script>
@endsection