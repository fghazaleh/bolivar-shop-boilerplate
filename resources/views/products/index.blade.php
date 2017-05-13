@extends('layouts.main')
@section('title', 'Products List')
@section('content')
    @if (count($products) > 0)
        @include('partials.breadcrumbs',['title'=>'Products'])
        <div id="content">
            <div class="container">
                <div class="row products">
                    @foreach($products as $product)
                        @include('products.partials.item')
                    @endforeach
                </div><!--/row-products-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pages">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div><!--.row-->
            </div><!--/.container-->
        </div><!--/.content-->
    @else
        @include('partials.error',['errorHeader'=>'We are sorry - this page is not here anymore','errorMsg'=>'Error 404 - Page not found'])
    @endif
@endsection
