$.ajax({
    url:'/api/payment/token.json',
    type:'get',
    dataType:'json'

}).success(function(data){
    if (data.error == false) {
        $('#paymentPlaceholder').text('');
        braintree.setup(data.token, 'dropin', {
            container: 'paymentPlaceholder'
        });
    }else{
        $('#paymentPlaceholder').html('<p>Unable to display payment method, please try later.</p>');
    }
}).error(function(e){
    $('#paymentPlaceholder').html('<p>Unable to display payment method, please try later.</p>');
    console.log('Error payment token');
});