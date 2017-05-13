<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th colspan="2">Product</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Discount</th>
            <th colspan="2">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartService->all() as $item)
            <tr>
                <td>
                    <a href="{{route('product.show',slug($item))}}">
                        <img src="{{ asset($item->image) }}" alt="Item image" class="img-responsive">
                    </a>
                </td>
                <td><a href="{{route('product.show',slug($item))}}">{{ $item->title  }}</a></td>
                <td>
                    <form action="{{route('cart.update',[$item->id])}}" method="post" class="form-inline">
                        {{ csrf_field() }}<input type="hidden" name="_method" value="PUT" />
                        <select name="quantity" class="form-control input-sm">
                            <option value="0">None</option>
                            @foreach(range(1,$item->stock) as $num)
                                <option value="{{$num}}" {{ ($num == $item->totalQuantity)?'selected':'' }}>{{$num}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm"><i class="fa fa-refresh"></i></button>
                    </form>
                </td>
                <td>${{money($item->price)}}</td>
                <td>$0.00</td>
                <td>${{money($item->totalPrice)}}</td>
                <td>
                    <form action="{{route('cart.delete',[$item->id])}}" method="post">
                        {{ csrf_field() }}<input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-sm"><i class="fa fa-trash-o"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5">Total</th>
            <th colspan="2">${{ money($cartService->grossTotal()) }}</th>
        </tr>
        </tfoot>
    </table>
</div><!-- /.table-responsive -->