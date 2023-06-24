@extends('layouts.master')

@section('title')
<title>Cart page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<script src="{{asset('product/cart/cartajax.js')}}"></script>
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
@endsection
@section('content')
@include('product.components.show_cart')


@endsection






















