@inject('shippingService', 'App\Foundation\Services\Contracts\ShippingServiceInterface')
@php
$shippingCost = $shippingService->getShippingCost();
@endphp
<div class="col-md-3">
    <div class="box" id="order-summary">
        <div class="box-header">
            <h3>Order summary</h3>
        </div>
        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td>Order subtotal</td>
                    <th>${{money($cartService->grossTotal())}}</th>
                </tr>
                <tr>
                    <td>Shipping and handling</td>
                    <th>{{ $shippingCost==0?'Free':'$'.money($shippingCost)}}</th>
                </tr>
                <tr>
                    <td>Tax</td>
                    <th>$0.00</th>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <th>${{money($cartService->grossTotal()+$shippingCost)}}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div><!--/.box-->
</div><!--/.col-3-->