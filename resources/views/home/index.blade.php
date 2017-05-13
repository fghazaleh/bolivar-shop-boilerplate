@extends('layouts.main')
@section('title','Home')
@section('content')
    @include('partials.breadcrumbs',['title'=>'Home'])
    <div id="content">
        <div class="container">
            <h1>Home Page</h1>
        </div><!--/container-->
    </div><!--/content-->
@endsection