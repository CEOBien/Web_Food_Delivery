@extends('layouts.master')

@section('title')
<title>Home page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<script src="{{asset('product/cart/cartajax.js')}}"></script>
@endsection
@section('content')


	


<section>
    <div class="container">
        <div class="row">
            @include('components.slidebar')
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach ($products as $productItems)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href=""><img src="{{ config('app.base_url') . $productItems->feature_image_path }}" alt="" /></a>
                                        <h2>${{$productItems->price}}</h2>
                                        <p>{{$productItems->name}}</p>
                                        <a href="#" data-url="{{route('addToCart', ['id' => $productItems->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>                                    </div>
                                    <!-- <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>${{$productItems->price}}</h2>
                                            <p>{{$productItems->name}}</p>
                                            <a href="#" data-url="{{route('addToCart', ['id' => $productItems->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>                                        </div>
                                    </div> -->
                            </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="{{route('productDetail', ['id' => $productItems->id])}}"><i class="fa fa-plus-square"></i>Add to productDetail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                
                    
                        {{-- {{$products->links()}} --}}
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>



@endsection



	

	

  
  