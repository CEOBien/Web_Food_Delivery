@extends('layouts.master')

@section('title')
<title>Detail Food page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
    <script src="{{asset('product/cart/cartajax.js')}}"></script>
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
@endsection
@section('content')

<section>
    <div class="container">
        <div class="row">
          
            @include('components.slidebar')
        
            
            <div class="col-sm-9 padding-right">
               
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    
                  @include('product.components.product_detail')
                </div><!--/category-tab-->
                
                @include('home.components.recommended_product')
                
            </div>
        </div>
    </div>
</section>





@endsection










