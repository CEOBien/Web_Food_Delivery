@extends('layouts.master')

@section('title')
<title>blog detail</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<style>
	button.guicomment {
    margin-left: 659px;
    margin-top: 9px;
    color: white;
    border: none;
    height: 30px;
}
button.replybutton.btn.btn-primary.btn-reply {
    margin-bottom: 10px;
}
</style>
@endsection
@section('js')
<script src="{{asset('product/cart/cartajax.js')}}"></script>
<script >
	//biến này để dùng chung cho các function
	 var commentUrl = "{{ route('comment', $blogshow->id)}}";
	 //gọi ajax cho comment cha
	$(document).ready(function(){
		//sự kiện click cho nút
		$('.submitcomment').click(function(event){
			//ngăn chặn sự kiện
        event.preventDefault();
		//tạo biến content để lấy dât nhập vào từ textarea 
        var content = $('#comment').val();
		//tạo biến token cho form
        var _token = $('input[name="_token"]').val();
        
		$.ajax({
		//ở đây ta sử dụng POST để có thể lấy dữ liệu từ DB
        type:"POST",
		//cái này là chỉ đường dẫn
        url: commentUrl,
		//còn đây để nhận dữ liệu
        data:{comment:content,
			_token:_token,
		},
        success: function(data){
			//cái này các bạn nếu muốn thông báo lỗi có thể thêm
            if(data.error)
            {
				//in lỗi ra ra thẻ div có id tên comment-eror
               $('#comment-error').html(data.error)
               
            }else{
				//nêu k có lỗi thì để trống
				$('#comment-error').html('');
				$('#comment').val('');
				//dòng này để hiện thì nôi dụng cmt ra commentshow
				$('#commentshow').html(data);
				
			}
        },
       
       
    })
	});
});
//dòng này dùng cho nút cancer để đóng cmt
$(document).on('click', '.cancelbutton', function(event){
	event.preventDefault();
	
	$('.formReply').slideUp();
	
});
//cái này bắt sự kiện cho cmt con
$(document).on('click', '.btn-reply', function(event){
	event.preventDefault();
	//ở đây mk phải lấy id của nó nha tức là id của cmt cha đó
	var id = $(this).data('id');
	//cái này là lấy id form rep_ly 
	var form_reply_id = '.form-reply-' + id;
	//cái này lấy id nội dung nha
	var comment_reply_id = '#comment-reply-' + id;
	//rùi chèn zô để đây để có thể lấy dữ liệu
	var comment_reply = $(comment_reply_id).val();
	$('.formReply').slideUp();
	$(form_reply_id).slideDown();
});
//phần này các bạn có thể nhìn ở trên nha mk k giải thích lại
//ở đây sẽ call ajax cho cmt con
$(document).on('click', '.btn-send-comment', function(event){
	event.preventDefault();
	var id = $(this).data('id');
	var comment_reply_id = '#comment-reply-' + id;
	var comment_reply = $(comment_reply_id).val();
	var form_reply_id = '.form-reply-' + id;
	var _token = $('input[name="_token"]').val();
	$.ajax({
        type:"POST",
        url: commentUrl,
        data:{comment:comment_reply,
		reply_id: id,
		_token:_token,
		},
        success: function(data){
            if(data.error)
            {
               $('#comment-error').html(data.error)
               
            }else{
				$('#comment-error').html('');
				$('#comment').val('');
				$('#commentshow').html(data);
				
			}
        },
       
       
    })
});
</script>



@endsection
@section('content')
	
       
<section class="section wb">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
				<div class="page-wrapper">
					<div class="blog-title-area">
						<span class="color-green"><a href="garden-category.html" title="">QuickFood</a></span>

						<h3>{{$blogshow->title}}</h3>

						<div class="blog-meta big-meta">
							<small><a href="garden-single.html" title="">{{$blogshow->created_at}}</a></small>
							<small><a href="blog-author.html" title="">Admin</a></small>
							<small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
						</div><!-- end meta -->

					</div><!-- end title -->

					<div class="single-post-media">
						<img src="{{ config('app.base_url') . $blogshow->feature_image_path }}" alt="">

					</div><!-- end media -->

					<div class="blog-content">
						<div class="pp">
							<p>{!!html_entity_decode($blogshow->content)!!}</p>
						</div><!-- end pp -->

					</div><!-- end content -->

					<div class="blog-title-area">
						<div class="tag-cloud-single">
							<span>Tags</span>
							<small><a href="#" title="">lifestyle</a></small>
							<small><a href="#" title="">colorful</a></small>
							<small><a href="#" title="">trending</a></small>
							<small><a href="#" title="">another tag</a></small>
						</div><!-- end meta -->

						<div class="post-sharing">
							<ul class="list-inline">
								<li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
								<li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
								<li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div><!-- end post-sharing -->
					</div><!-- end title -->


					

					<div class="comments-list-wrap">
						
						{{-- nếu cái tồn tại tài khoản thì nó mới hiện phần comment --}}
						@if (!empty(auth()->user()->name))
							<div class="comment-template">
								<h4>Leave a comment</h4>
								<p>If you have a comment dont feel hesitate to send us your opinion.</p>
								<form action="#">
									@csrf
									<p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message"></textarea></p>
									<p><input type="button" class="submitcomment" value="Submit"></p>
								</form>
							</div>
						@endif
					
					
					<div id="commentshow" class="commentshow">
						@include('blog.blogdetail.list-comment')
					</div>
				
						
					</div>
					

				</div><!-- end page-wrapper -->
				<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
					<div class="sidebar">
						<div class="widget">
							<h2 class="widget-title">Recent Posts</h2>
							<div class="blog-list-widget">
								<div class="list-group">
									<ul>
										<li>
											<a href="">
												<img src="http://st.suckhoegiadinh.com.vn/staticFile/Subject/2019/11/28/fastfoodheartdiseasepic3_281322855.jpg" alt="">
											</a>
											<div class="post-info">
												<a href="">
													<h3>The best hamburger in the world</h3>
												</a>
											</div>
										</li>
	
										<li>
											<a href="">
												<img src="https://www.uplevo.com/blog/wp-content/uploads/2019/07/kinh-doanh-tra-sua-do-an-vat.jpg" alt="">
											</a>
											<div class="post-info">
												<a href="">
													<h3>Young customers prefer strong tea</h3>
												</a>
											</div>
										</li>
										<li>
											<a href="">
												<img src="https://blog.dktcdn.net/files/ban-do-an-nhanh-buoi-sang-1.jpg" alt="">
											</a>
											<div class="post-info">
												<a href="">
													<h3>Discover fast food that is loved by many people</h3>
												</a>
											</div>
										</li>
										<li>
											<a href="">
												<img src="https://c.pxhere.com/photos/da/e1/beans_breads_breakfast_butter_cheese_close_up_delicious_dish-1546661.jpg!d" alt="">
											</a>
											<div class="post-info">
												<a href="">
													<h3>Burger King conquers the vegetarian market in Europe</h3>
												</a>
											</div>
										</li>
	
									</ul>
	
								</div>
							</div><!-- end blog-list -->
						</div><!-- end widget -->
	
					</div><!-- end wrapper -->
				</div>
			</div><!-- end col -->
			
			
		</div>
		
	</div>
</section>




@endsection 
