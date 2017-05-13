@inject('cartService', 'App\Foundation\Services\Contracts\CartServiceInterface')
<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('product.list') }}">{{config('bolivar-shop.name')}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('cart') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart ({{$cartService->itemCount()}})</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>