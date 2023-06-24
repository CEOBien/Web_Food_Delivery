@extends('layouts.master')

@section('title')
<title>BLog page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<script src="{{asset('product/cart/cartajax.js')}}"></script>

@endsection
@section('content')


@include('blog.components.bloglist')

@endsection

	
	