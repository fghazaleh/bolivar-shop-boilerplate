@extends('layouts.main')
@section('title', 'Shopping Cart')
@section('content')
    @include('partials.breadcrumbs',['title'=>'Shopping Cart'])
    <div id="content">
        <div class="container">
            @if ($cartService->itemCount() == 0)
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted lead">You have no item in your cart. <a href="{{route('product.list')}}">Start shopping</a></p>
                    </div>
                </div><!--/.row-->
            @else
            <div class="row">
                <div class="col-md-12">
                    <p class="text-muted lead">You currently have {{$cartService->itemCount()}} item(s) in your cart.</p>
                </div>
            </div><!--/.row-->
            <div class="row">
                <div class="col-md-9" id="basket">
                    <div class="box">
                        @include('cart.partials.product_items')
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{ route('product.list') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('order.index') }}" class="btn btn-template-main">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div><!--/.col-9-->
                @include('cart.partials.order_summary')
            </div><!--/.row-->
            @endif
        </div><!--/.container-->
    </div><!--/.content-->
@endsection