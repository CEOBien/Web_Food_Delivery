{{-- phần này để hiển thị tổng số cmt của blog --}}
<h3 class="comment-count-title">all the comment({{$commentshowone}})</h3>
{{-- ta sẽ dùng 2 vòng for nha do cái này mk k bt đệ quy sao cho phù hợp lên dùng 2 vòng for --}}
{{-- ở đây các bạn phải vô phần model để thêm relasionship nha
	ta sẽ dùng vòng lặp for đầu tiên để in ra cmt tra --}}
@foreach ($blogshow->commentshow as $comments)
					<div class="comment-list">
						<div class="single-comment-body">
                            @if ($comments->reply_id == 0)
							<div class="comment-user-avater">
								<img src="https://tse2.mm.bing.net/th?id=OIP.mdSrR6Of_kQ-D1se0OUeowAAAA&pid=Api&P=0&w=300&h=300" alt="">
							</div>
                          
							<div class="comment-text-body">
								
                               
                                        <div class="border">
                                         <h4>{{$comments->cus->name}} <span class="comment-date">{{$comments->created_at}}</span></h4>
									        <p class="colorComment">{{$comments->noidung}}</p>
								        </div>
                                   
                                     
								{{-- ở đây nếu tồn tại tài khoản mới dc cmt k thì sẽ chuyển đến trang login --}}
								@if (!empty(auth()->user()->name))
									<button class="replybutton btn btn-primary btn-reply" data-id="{{$comments->id}}" data-commentbox="panel1" >Reply</button><br/>
								@else
									<a type="button" class="returnLogin" href="{{route('index')}}" style="text-decoration: none;
									border-radius: 5px;
									padding: 3px;
									width: 30px;
									background: orange;
									font-size: 15px;">Reply</a> 
								@endif
                               
                            <form action="" method="POST" style="display: none" class="formReply form-reply-{{$comments->id}}">
                                @csrf
                                <div class="replybox" id="panel1" >
                                    <input type="text" id="comment-reply-{{$comments->id}}" class="col-md-12" style="height: 65px; border-radius:10px" ><br/>
                                    <button class="guicomment btn-send-comment" data-id="{{$comments->id}}">send</button>
                                    <button class="cancelbutton btn btn-primary">Cancel</button><br/><br/>
                                </div>
                            </form>
							

							</div>
                            @endif
						{{-- ta dùng vòng lặp for lồng nhau để in cmt con --}}
						@foreach ($comments->reply as $commentschild)
							<div class="single-comment-body child ">
								<div class="comment-user-avater">
									<img src="https://tse2.mm.bing.net/th?id=OIP.mdSrR6Of_kQ-D1se0OUeowAAAA&pid=Api&P=0&w=300&h=300" alt="">
								</div>
								<div class="comment-text-body">
									<div class="border">
										{{-- ở phần này các bạn cũng phải vô phần model để tạo relationship nha thì mới hiện tên lên được --}}
										<h4>{{$commentschild->cus->name}} <span class="comment-date">{{$commentschild->created_at}}</span> </h4>
										<p>{{$commentschild->noidung}}</p>
									</div>
									
									@if (!empty(auth()->user()->name))
									<button class="replybutton btn btn-primary btn-reply" data-id="{{$comments->id}}" data-commentbox="panel2" >Reply</button><br/>
								@else
									<a type="button" class="returnLogin" href="{{route('index')}}" style="text-decoration: none;
									border-radius: 5px;
									padding: 3px;
									width: 30px;
									background: orange;
									font-size: 15px;">Reply</a> 
								@endif
							{{-- <div class="replybox" id="panel2" style="display:none">
							<input type="text" class="col-md-12" style="height: 80px"><br/>
							<button class="cancelbutton btn btn-primary">Cancel</button><br/><br/> --}} 
							</div>
								</div>
							</div>
						@endforeach
						</div>
						
					</div>
					@endforeach