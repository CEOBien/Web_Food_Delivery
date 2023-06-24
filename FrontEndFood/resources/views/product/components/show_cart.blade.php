<section id="cart_items" class="cart_Waraper">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Home</a></li>
              <li class="active">Food Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info" data-url="{{route('deleteCart')}}">
            <table class="table table-condensed update_cart_url" data-url="{{route('updateCart')}}">
                <thead>
                    <tr class="cart_menu">
                        <td >#</td>
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
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>${{$total}}</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>${{$total + 2}}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->