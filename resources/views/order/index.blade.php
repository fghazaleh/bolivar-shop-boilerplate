@extends('layouts.main')
@section('title', 'Your Order')
@section('content')
    @include('partials.breadcrumbs',['title'=>'Checkout'])
    <div id="content">
        <div class="container">
            <div class="row">
                @include('partials.server_error')
                <div class="col-md-9 clearfix" id="checkout">
                    <div class="box">
                        <form action="{{ route('order.place-order') }}" method="post">
                            {{ csrf_field() }}
                            @include('order.partials.user_details')
                            @include('order.partials.shipping_address')
                            @include(config('bolivar-shop.payment.gateway.view'))
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to cart</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-template-main">Place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div><!--/.box-footer-->
                        </form>
                    </div><!--/.box-->
                </div><!--/.col-9-->

                @include('cart.partials.order_summary')

            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.content-->
@endsection



{{--
<form action="{{ route('order.place-order') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <h3>Your details</h3>
                    <br />
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" id="password" name="password" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Shipping Address</h3>
                    <br />
                    <div class="form-group">
                        <label for="address1">Address line 1</label>
                        <input type="text" id="address1" name="address1" value="{{old('address1')}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="address2">Address line 2</label>
                        <input type="text" id="address2" name="address2" value="{{old('address2')}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="{{old('city')}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal code</label>
                        <input type="text" id="postal_code" name="postal_code" value="{{old('postal_code')}}" class="form-control"/>
                    </div>
                </div>
                <br />
                <h3>Payment</h3>
                <br />
                <div id="paymentPlaceholder"></div>

                <br />
            </div><!--/row-->
        </div>
        <div class="col-md-4">
            <div class="well">
                <h4>Your order</h4>
                <br />
                --}}
{{-- @include('cart.partials.product_items')--}}{{--

                <br />
                --}}
{{--         @include('cart.partials.summary')--}}{{--


                <button type="submit" class="btn btn-success btn-sm">Place order</button>
            </div><!--/well-->
        </div>
    </div><!--/row-->
</form>--}}
