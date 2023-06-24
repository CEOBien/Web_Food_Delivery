<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{getConfigValueFromSettingTable('phone_contact')}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{getConfigValueFromSettingTable('email')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{getConfigValueFromSettingTable('facebook')}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-5 header-middle-right">
                    <div class="row">
                        <div class=" col-sm-5 logo pull-left">
                            <a href="{{route('home')}}"><img src="/Eshopper/images/home/logoQFood.png" alt="" width="100%" height="auto" /></a>
                        </div>

                        <div class="col-sm-7 search_box pull-left">
                            <form class="form-inline" method="get" action="{{ route('searchProduct') }}">

                                <input type="text" class="form-control" name="key" placeholder="search">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </form>
                           
                        </div>
                </div>
                </div>
                <div class="col-sm-7 header-middle-left">
                    <div class="shop-menu pull-right">
                        <ul class="navs navbar-nav">
                            
                            <li>
                                @if (!empty(auth()->user()->name))
                                    <img src="https://tse2.mm.bing.net/th?id=OIP.mdSrR6Of_kQ-D1se0OUeowAAAA&pid=Api&P=0&w=300&h=300" style="height: 25px;
                                    width: 25px;
                                    border-radius: 50%;
                                    margin-top: -3px;" alt="">
                                    {{auth()->user()->name}}
                                @endif
                                
                               
                            </li>
                            <li>
                                @if (Session::has('nofitication'))
                                {{Session::get('nofitication')}}

                                @endif

                                 
                            </li>
                            <li>@if (Session::has('nofitication1'))
                                {{Session::get('nofitication1')}}
                                @endif
                            </li>
                            
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li class="cart"><a href="{{route('showCart')}}"><i class="fa fa-shopping-cart icon-cart"></i> Cart</a></li>

                            <li>
                                <a href="{{route('index')}}"><i class="fa fa-lock icon-login"></i> Login</a>

                            </li>

                            <li>
                                <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>

                            </li>
                        </ul>

                    </div>
                   <!-- nav dành cho ipad -->
                    <div class="nav-ipad">
                    <ul class="navs navbar-nav">
                    <li><a href="{{route('showCart')}}">
                   <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"></path></svg></a></li>
                    <li>
                        <a href="{{route('index')}}">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock" class="svg-inline--fa fa-lock fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path></svg></i></a>
                    </li>
                    </ul>
                    </div><!--end ipad-->
                
            </div>
            </div>
        </div>      
        </div>
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <input type="checkbox" class="check-box" id="check-box">
                    <label for="check-box" class="menu-bar">
                        <span></span>
                    </label>
                    @include('components.main_menu')
                     <div class="nav-phone">
                         <div class="logo">
                         <a href="{{route('home')}}"><img src="/Eshopper/images/home/logoQFood.png" alt="" /></a>
                         </div>
                         <label for="check-box" class="close">
                             <i class="fa fa-times"></i>
                         </label>
                         <ul class="nav-list">
                         <li><a href="{{route('home')}}" class="active"><i class="fa fa-home fa-2x "style="color:#fbad46"></i>Home</a></li>
                         <li><a href="{{ route('blog') }}"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="color:#fbad46"></i>Blog</a> </li> 
                         <li><a href="{{route('error')}}"><i class="fa fa-bug fa-2x" style="color:#fbad46"></i>404</a></li>
                         <li><a href="{{route('contact')}}"><i class="fa fa-phone fa-2x"style="color:#fbad46"></i>Contact</a></li>
                         </ul>
                     </div>

                    <div class="smartphone-nav">
                      <li><a href="{{route('showCart')}}"><i class="fa fa-shopping-cart icon-cart"></i> Cart</a></li>
                      <li> <a href="{{route('index')}}"><i class="fa fa-user icon-login"></i> Login</a></li>         
                 </div>
                 <label for="check-box" class="overlay"></label>
                </div>  
                
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    
</header>
<!--/header-->