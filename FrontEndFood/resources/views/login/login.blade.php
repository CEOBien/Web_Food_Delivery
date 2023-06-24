@extends('layouts.master')

@section('title')
<title>Login</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('js')

    <script src="{{asset('product/cart/cartajax.js')}}"></script>

	<script>
		$(document).ready(function(){
			
			$('#email').blur(function(){
				var error_email = '';
				var email = $('#email').val();	
				var _token = $('input[name="_token"]').val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if(!filter.test(email))
				{    
					$('#error_email').html('<label class="text-danger">Invalid Email</label>');
					$('#email').addClass('has-error');
					$('#register').attr('disabled', 'disabled');
				}
				else
				{
					$.ajax({
						url:"{{ route('login.checkEmail') }}",
						method:"POST",
						data:{email:email, _token:_token},
						success:function(result)
						{
						if(result == 'unique')
						{
							$('#error_email').html('<label class="text-success">Email Available</label>');
							$('#email').removeClass('has-error');
							$('#register').attr('disabled', false);
						}
						else
						{
							$('#error_email').html('<label class="text-danger">Email not Available</label>');
							$('#email').addClass('has-error');
							$('#register').attr('disabled', 'disabled');
						}
						}
					})
				}

			
			});
			
		});
		
	</script>
	
@endsection
@section('content')

	<div>@if (Session::has('register'))
		{{ Session::get('register') }}
	@endif</div>
	<section id="form">
	<div class="container login"> 
	<div class="login-wrap">
	<div class="login-html">
		
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="{{route('login')}}" method="post">
				@csrf
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="email" class="input" name="email">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="password">
				</div>
				<div style="margin-left:10px;color:red">
					@if (Session::has('thongbaokhancap'))
					{{ Session::get('thongbaokhancap') }}
					@endif
					
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check" id="remember-me" name="remember_me" class="checkbox"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="btn btn-default button-login" value="Sign In">
				</div>
				</form>
			</div>
			<div class="sign-up-htm">
				<form action="{{route('register')}}" method="post" >
				@csrf
				<div class="group">
					<label for="user" class="label">Username</label>
					<input  type="text" class="input" name="name">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input  id="email" type="email" class="input" name="email">
					<span id="error_email"></span>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input type="password" class="input"  name="password">
				</div>
				
				<div class="group">
					<input type="submit" class=" btn btn-default button-logup" id="register" value="Sign Up">
				</div>
				{{ csrf_field() }}
				</form>
				
			</div>
		</div>
	</div>
</div>
</div>
</section>

@endsection
