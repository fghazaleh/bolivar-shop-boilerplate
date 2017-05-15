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