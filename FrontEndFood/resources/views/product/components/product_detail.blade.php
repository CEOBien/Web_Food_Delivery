<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{ config('app.base_url') . $productsDetail->feature_image_path }}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach ($products as $keyProduct =>  $product)
                        @if ($keyProduct % 3 == 0)
                        <div class="item {{$keyProduct == 0 ? 'active' : ''}}" >
                        @endif
                          
                        <img style="width: 80px; height:80px;object-fit: cover" src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                        @if ($keyProduct % 3 == 2)
                            </div>
                        @endif
                    @endforeach
                    
                      
                     
                    
                    
                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        
        <div class="product-information"><!--/product-information-->
            <img src="" class="newarrival" alt="" />
            <h2>{{$productsDetail->name}}</h2>
            
            
            <span>
                <span>US ${{$productsDetail->price}}</span>
               
                    <label>Quantity:</label>
                    <input type="number" class="quantity"  value="1" min="1"/>
                    <button  type="button" class="btn btn-fefault  add-to-cart " data-url="{{route('addToCart',['id' => $productsDetail->id])}}">
                    <i class="fa fa-shopping-cart" ></i>
                    Add to cart
                </button>
                
            </span>
            <span>{!!html_entity_decode($productsDetail->content)!!}</span>
           
            
            
           
        </div><!--/product-information-->
      
        
    </div>
</div><!--/product-details-->





<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categorys as $indexCategory => $categoryItem)
            <li class="{{$indexCategory == 0 ? 'active' : ''}}">
                <a href="#category_tab_{{$categoryItem->id}}" data-toggle="tab">
                    {{$categoryItem->name}}
                </a>
            </li>
            @endforeach
            
       
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categorys as $indexCategoryProduct => $categoryItemProduct)
        
        <div class="tab-pane fade {{ $indexCategoryProduct == 0 ? 'active in' : '' }}" id="category_tab_{{$categoryItemProduct->id}}" >
      
            @foreach ($categoryItemProduct->products as $productIteamTags)
            
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href=""><img src="{{ config('app.base_url') . $productIteamTags->feature_image_path }}" alt="" /></a>
                            <h2>${{$productIteamTags->price}}</h2>
                            <p>{{$productIteamTags->name}}</p>
                            <a href="#" data-url="{{route('addToCart',['id' => $product->id])}} " class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
            
         
        </div>
        @endforeach
       
</div>

