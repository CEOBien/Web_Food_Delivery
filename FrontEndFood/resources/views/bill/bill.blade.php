@extends('layouts.master')

@section('title')
<title>Check out page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<script src="{{asset('product/cart/cartajax.js')}}"></script>
@endsection
@section('content')


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

		
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info " id="cart_items"> 
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
                            <td>#</td>
							<td class="image">Image Food</td>
                            <td class="description">Food</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            
                            <td class="action">Action</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $id => $cartItem)
                            @php
                                $total += $cartItem['price'] * $cartItem['quantity'];
                            @endphp
                        <tr>
                            <td>{{$id}}</td>
                            @if (isset($cartItem['image']))
                                <td class="cart_product">
                                    <img style="width: 125px ; height:100px" src="{{ config('app.base_url') . $cartItem['image'] }}" >
                                </td>
                            @else 
                                <td class="cart_product">
                                   
                                </td>
                            @endif
                            
                            <td class="cart_description">
                                <h4>{{$cartItem['name']}}</h4>
                               
                            </td>
                            <td class="cart_price">
                                <p>${{$cartItem['price']}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    
                                    <input class="cart_quantity_input quantity" type="number" name="quantity" value="{{$cartItem['quantity']}}" min='1'>
                                    
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{$cartItem['price'] * $cartItem['quantity']}}</p>
                            </td>
                            
                            <td class="cart_delete">
                                <a href="#" data-id="{{$id}}" class="btn btn-primary cart_update">update</a>
                                <a href="#" data-id="{{$id}}" class="btn btn-danger cart_delete1">delete</a>
                               
                            </td>
							
                        </tr>
						
    
                      
                        @endforeach
                     
						
					   
                    </tbody>
				
				</table>
				<div class="shopper-informations">
					<div class="row">
						<div class="col-sm-6">
							<div class="shopper-info">
								<p style="text-align: center">Shopper Information</p>
								<form action="{{route('store')}}" method="post">
									@csrf
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="text" name="name" placeholder="Name">
									<input type="text" name="email" placeholder="Email">
									<input type="text" name="address" placeholder="Address">
									<input type="number" name="phone" placeholder="Phone Number">
									<input type="text" name="message" placeholder="note">
	
									<input type="submit" class="btn btn-primary" value="Order">
	
								</form>
								
								
								
							</div>
						</div>
						<div class="col-sm-6">
							<div class="total_area">
								<p class="TitleTotal" style="text-align: center">Total</p>
								<ul>
									<li>Cart Sub Total <span>${{$total}}</span></li>
									<li>Eco Tax <span>$2</span></li>
									<li>Shipping Cost <span>Free</span></li>
									<li>Total <span>${{$total + 2}}</span></li>
								</ul>
									
							</div>
						</div>
										
					</div>
				</div>	
				
			</div>
			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

	


	
	
	


@endsection
