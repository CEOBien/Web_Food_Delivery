@extends('layouts.master')

@section('title')
<title>QuickFood</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">

@endsection
@section('js')
    <script src="{{asset('product/cart/cartajax.js')}}"></script>
    
    
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
   
@endsection
@section('content')

{{-- slider --}}
@include('home.components.slider')
{{-- end slider --}}

<section>
    <div class="container">
        <div class="row">
           @include('components.slidebar')
            
            <div class="col-sm-9 padding-right">
                <div id="particles-js"></div>
                <!--features_items-->
                @include('home.components.feature_product')
                <!--features_items-->
                <!--category-tab-->
                @include('home.components.category_tag')
                <!--/category-tab-->
                <!--recommended_items-->
                @include('home.components.recommended_product')
                <!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>


@endsection



