<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        @yield('title')
        <link href="/Eshopper/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Eshopper/css/font-awesome.min.css" rel="stylesheet">
        <link href="/Eshopper/css/prettyPhoto.css" rel="stylesheet">
        <link href="/Eshopper/css/price-range.css" rel="stylesheet">
        <link href="/Eshopper/css/animate.css" rel="stylesheet">
        <link href="/Eshopper/css/main.css" rel="stylesheet">
        <link href="/Eshopper/css/responsive.css" rel="stylesheet">
        

        
        
        @yield('css')
    </head>
    
    <body>
    
     @include('sweetalert::alert')
    @include('components.header')
   
    @yield('content')

    @include('components.footer')
       
       
        <script src="/Eshopper/js/jquery.js"></script>
        <script src="/Eshopper/js/bootstrap.min.js"></script>
        <script src="/Eshopper/js/jquery.scrollUp.min.js"></script>
        <script src="/Eshopper/js/price-range.js"></script>
        <script src="/Eshopper/js/jquery.prettyPhoto.js"></script>
        <script src="/Eshopper/js/main.js"></script>
        <script src="{{asset('product/cart/snow.js')}}"></script>
        
        @yield('js')
        
    </body>
</html>