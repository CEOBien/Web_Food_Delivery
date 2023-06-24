<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">
            <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>About QuickFood</h2>
                        <p>We are a young company always looking for new and creative ideas to help you with our
                            products in your everyday work.
                        </p>
                      
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>Contact</h2>
                          <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Vietnam-Korea University Of Information And Comunication Technology</a></li>
                            <li><a href="#">Tel: {{getConfigValueFromSettingTable('phone_contact')}}</a></li>
                            <li><a href="#">Email: {{getConfigValueFromSettingTable('email')}}</a></li>
                          
                        </ul>
                        
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quick link</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('error')}}">404</a></li>
                            <li><a href="#"></a></li>
                        </ul>
                      
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2>Follow us</h2>
                        <ul class="nav navbar-nav follow-node">
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
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                {!! getConfigValueFromSettingTable('footer_infomation') !!}
            </div>
        </div>
    </div>
    
</footer><!--/Footer-->