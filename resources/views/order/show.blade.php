@extends('layouts.main')
@section('title', 'Order history details')
@section('content')
    @include('partials.breadcrumbs',['title'=>'Order # '.$order->id])
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <p class="lead">
                        Order #{{$order->id}} was placed on <strong>{{$order->created_at->format('d/m/Y')}}</strong> and is currently
                        <strong>Shipped</strong>.
                    </p>
                    <p class="lead text-muted">If you have any questions, please feel free to <a href="#">contact us</a>, our customer service center is working for you 24/7.</p>
                    <div class="box">
                        @include('order.partials.product_items_history')
                        <div class="row addresses">
                            <div class="col-sm-6">
                                <h3 class="text-uppercase">Invoice address</h3>
                                <p>
                                    {{$customer->name}}<br />
                                    {{$address->address1}}<br />
                                    {{$address->address2}}<br />
                                    {{$address->city}}<br />
                                    {{$address->postal_code}}<br />
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <h3 class="text-uppercase">Shipping address</h3>
                                <p>
                                    {{$customer->name}}<br />
                                    {{$address->address1}}<br />
                                    {{$address->address2}}<br />
                                    {{$address->city}}<br />
                                    {{$address->postal_code}}<br />
                                </p>
                            </div>
                        </div>
                        <!-- /.addresses -->
                    </div><!--/.box-->
                </div><!--/.col-9-->
                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***-->
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>
                        <div class="panel-body">
                            ...
                        </div>
                    </div><!--/.panel-->
                </div><!--/.col-3-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.content-->
@endsection