<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach ($categorys as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if ($category->categoryChildrent->count())
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                                <span class="badge pull-right">  
                                    <i class="fa fa-plus"></i> 
                                </span>
                                {{$category->name}}
                            </a>
                            @else
                            <a  href="{{ route('category.product', ['slug' => $categoryChilrents->slug,
                                'id' => $categoryChilrents->id]) }}">
                                <span class="badge pull-right">
                                    @if ($category->categoryChildrent->count())
                                    <i class="fa fa-plus"></i>
                                    @endif
                                    
                                </span>
                                {{$category->name}}
                            </a>
                        @endif
                    </h4>
                </div>
                <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($category->categoryChildrent as $categoryChilrents)
                                <li>
                                    <a href="{{ route('category.product', ['slug' => $categoryChilrents->slug,
                                        'id' => $categoryChilrents->id]) }}">
                                            {{$categoryChilrents->name}} 
                                    </a>
                                </li>
                            @endforeach
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            
           
        </div><!--/category-products-->


                   <div class="shipping text-center">
                   <a href="{{route('home')}}"><img src="/Eshopper/images/home/qc.jpg" alt="" width="100%" height="auto" /></a>
					</div><!--/shipping-->
					
	</div>

    </div>
    	