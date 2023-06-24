@extends('layouts.master')

@section('title')
<title>QuickFood</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home.home.css')}}">
@endsection
@section('js')
    <script src="{{asset('product/cart/cartajax.js')}}"></script>
@endsection
@section('content')


<section class="contact pt-100 pb-100" id="contact">
        <div class="container">
           <div class="row">
              <div class="col-xl-6 mx-auto text-center">
                 <div class="section-title mb-100">
                    
                    <h4>Contact us</h4>
                 </div>
              </div>
           </div>
           <div class="row text-center">
                 <div class="col-md-8">
                    <form action="{{route('send')}}" method="POST" class="contact-form">
                       @csrf
                       <div class="row">
                          <div class="col-xl-6">
                             <input type="text"  placeholder="name" name="name"  value="{{old('name')}}">
                              @error('name') <span class="text-danger">{{$message}}</span> @enderror
                          </div>
                          <div class="col-xl-6">
                             <input type="text"   placeholder="email" name="email" value="{{old('email')}}">
                             @error('email') <span class="text-danger">{{$message}}</span> @enderror
                          </div>
                          <div class="col-xl-6">
                             <input type="text"  placeholder="subject" name="subject" value="{{old('subject')}}">
                             @error('subject') <span class="text-danger">{{$message}}</span> @enderror
                          </div>
                          <div class="col-xl-6">
                             <input type="text"  placeholder="telephone" name="phone" value="{{old('phone')}}">
                             @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                          </div>
                          <div class="col-xl-12">
                             <textarea placeholder="message" cols="30" rows="10" name="message" value="{{old('phone')}}"></textarea>
                             @error('message') <span class="text-danger">{{$message}}</span> @enderror
                             <input type="submit" value="send message">
                            
                          </div>
                       </div>
                    </form>
                 </div>
                 <div class="col-md-4">
                    <div class="single-contact">
                       <i class="fa fa-map-marker"></i>
                       <h5>Địa chỉ</h5>
                       <p>Vietnam-Korea University Of Information And Comunication Technology</p>
                    </div>
                    <div class="single-contact">
                       <i class="fa fa-phone"></i>
                       <h5>Phone</h5>
                       <p> {{getConfigValueFromSettingTable('phone_contact')}}</p>
                    </div>
                    <div class="single-contact">
                       <i class="fa fa-envelope"></i>
                       <h5>Email</h5>
                       <p> {{getConfigValueFromSettingTable('email')}}</p>
                      
                    </div>
                 </div>
           </div>
        </div>
     </section>
     
@endsection


