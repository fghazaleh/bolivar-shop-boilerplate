<div id="content">
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3" id="error-page">
            <div class="box">
                <p class="text-center">
                    <a href="{{route('home')}}">
                        <img src="{{asset('theme/universal/img/logo.png')}}" alt="Logo">
                    </a>
                </p>
                <h3>{{$errorHeader}}</h3>
                <h4 class="text-muted">{{$errorMsg}}</h4>
                <p class="buttons"><a href="{{route('home')}}" class="btn btn-template-main"><i class="fa fa-home"></i> Go to Homepage</a>
                </p>
            </div>
        </div><!-- /.col-sm-6 -->
    </div><!--/container-->
</div><!--/content-->
