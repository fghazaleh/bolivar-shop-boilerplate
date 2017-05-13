@extends('layouts.main')
@section('title', 'Product Details - '.$product->title)
@section('content')
    @include('partials.breadcrumbs',['title'=>$product->title])
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="{{ $product->image }}" alt="{{ $product->title }} image"  class="img-responsive">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                @if ( $product->hasLowStock() )
                                    <div><span class="label label-warning">Low stock</span></div>

                                @endif
                                @if ( $product->outOfStock() )
                                    <div><span class="label label-danger">Out of stock</span></div>
                                @endif
                                <h4>Product details</h4>
                                <p>{{ $product->description }}</p>
                                <p class="price">${{money($product->price)}}</p>
                                <p class="text-center">
                                    @if ( $product->inStock() )
                                    <a href="{{ route('cart.add',[slug($product),1]) }}"  class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div><!--/.row #productMain-->
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Filter Section</h3>
                        </div>
                    </div><!--/.panel-->
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.content-->
@endsection

{{--
<div class="col-md-8">
    @if ( $product->hasLowStock() )
        <span class="label label-warning">Low stock</span>
    @endif
    @if ( $product->outOfStock() )
        <span class="label label-danger">Out of stock</span>
    @endif
    <h3>{{ $product->title }}</h3>
    <p>{{ $product->description }}</p>

    @if ( $product->inStock() )
        <a href="{{ route('cart.add',[$product->id.'-'.str_slug($product->title),1]) }}" class="btn btn-success btn-sm">Add to cart</a>
    @endif

</div>--}}
