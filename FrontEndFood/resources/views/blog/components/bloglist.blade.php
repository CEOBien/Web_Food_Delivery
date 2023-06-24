<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                    @foreach ($blogs as $blog)

                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                   
                                    <a href="garden-single.html" title="">
                                        <img src="{{ config('app.base_url') . $blog->feature_image_path }}" alt="" >
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <span class="bg-aqua"><a href="garden-category.html" title="">QuickFood</a></span>
                                <a href="{{route('blogDetail', ['id' => $blog->id])}}" id="commentId"><h3>{{ $blog->title}}</h3></a>
                                <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 1887</a></small>
                                <small><a href="garden-single.html" title="">{{$blog->created_at}}</a></small>
                                <small><a href="#" title="">Admin</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                                 
            @endforeach  
        

                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                {{ $blogs->links() }}
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="https://blog.dktcdn.net/files/thuc-an-nhanh-ngon-qua-1.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Burger King conquers the vegetarian market in Europe</h5>
                                        <small>12 Jan, 2021</small>
                                    </div>
                                </a>

                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="https://blog.dktcdn.net/files/ban-do-an-nhanh-buoi-sang-1.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Discover fast food that is loved by many people</h5>
                                        <small>11 Jan, 2021</small>
                                    </div>
                                </a>

                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="https://anh.24h.com.vn/upload/3-2016/images/2016-09-06/1473149955-thuc-an-nhanh.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">America lacks chicken, fast food restaurants struggle</h5>
                                        <small>07 Jan, 2021</small>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                  
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>


