<div class="features_items">
    <h2 class="title text-center">Features Items main</h2>
    @foreach ($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <a href=""><img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" /></a>
                        <h2>${{$product->price}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="#" data-url="{{route('addToCart', ['id' => $product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    {{-- <!-- <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>${{$product->price}}</h2>
                            <p>{{$product->name}}</p>
                            <a href="#" data-url="{{route('addToCart',['id' => $product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div> --> --}}
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="{{route('productDetail', ['id' => $product->id])}}"><i class="fa fa-plus-square"></i>Add to productDetail</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    
  
</div>