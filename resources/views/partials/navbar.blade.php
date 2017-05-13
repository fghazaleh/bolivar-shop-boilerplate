@inject('cartService', 'App\Foundation\Services\Contracts\CartServiceInterface')
<!-- *** NAVBAR *** -->
<div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">
    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="{{route('home')}}">
                    <img src="{{asset('theme/universal/img/logo.png')}}" alt="Universal logo" class="hidden-xs hidden-sm">
                    <img src="{{asset('theme/universal/img/logo-small.png')}}" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->
            <div class="navbar-collapse collapse" id="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown active">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="dropdown use-yamm yamm-fw">
                        <a href="{{route('product.list')}}">Products</a>
                    </li>
                    <li class="dropdown use-yamm yamm-fw">
                        <a href="{{route('order.index')}}">My Order</a>
                    </li>
                    <li class="dropdown use-yamm yamm-fw">
                    <li><a href="{{ route('cart') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart ({{$cartService->itemCount()}})</a></li>
                    </li>
                    <li class="dropdown use-yamm yamm-fw">
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
            <div class="collapse clearfix" id="search">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                </span>
                    </div>
                </form>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /#navbar -->
</div>
<!-- *** NAVBAR END *** -->
