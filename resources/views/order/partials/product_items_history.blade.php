<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th colspan="2">Product</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Discount</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->orderItems as $item)
            <tr>
                <td>
                    <a href="{{route('product.show',slug($item))}}">
                        <img src="{{ asset($item->image) }}" alt="Item image" style="max-height: 50px;" class="img-responsive">
                    </a>
                </td>
                <td><a href="{{route('product.show',slug($item))}}">{{ $item->title  }}</a></td>
                <td>{{$item->pivot->quantity}}</td>
                <td>${{money($item->price)}}</td>
                <td>$0.00</td>
                <td>${{money($item->totalPrice)}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5" class="text-right">Order subtotal</th>
            <th>${{money($order->subtotal)}}</th>
        </tr>
        <tr>
            <th colspan="5" class="text-right">Shipping and handling</th>
            <th>${{money($order->shipping_cost)}}</th>
        </tr>
        <tr>
            <th colspan="5" class="text-right">Tax</th>
            <th>$0.00</th>
        </tr>
        <tr>
            <th colspan="5" class="text-right">Total</th>
            <th>${{money($order->total)}}</th>
        </tr>
        </tfoot>
    </table>
</div><!-- /.table-responsive -->