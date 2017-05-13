<div class="col-md-3 col-sm-4">
    <div class="product">
        <div class="image" style="height: 263px;">
            <a href="{{ route('product.show',slug($product)) }}">
                <img src="{{ $product->image }}" alt="{{ $product->title }}"  class="img-responsive" />
            </a>
        </div>
        <!-- /.image -->
        <div class="text">
            <h3><a href="{{ route('product.show',slug($product)) }}">{{$product->title}}</a></h3>
            <p class="price">${{money($product->price)}}</p>
            <p class="buttons">
                {{--<a href="shop-detail.html" class="btn btn-default">View detail</a>--}}
                {{--<a href="shop-basket.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
            </p>
        </div>
        <!-- /.text -->
    </div><!-- /.product -->
</div><!--/.col-->
