<div class="mainmenu">
    <ul class="nav navbar-nav ">
        <li><a href="{{route('home')}}" class="active">Home</a></li>
        @foreach ($categorysLimit as $categoryParent)
            <li class="dropdown"><a href="#">
                {{$categoryParent->name}}
                <i class="fa fa-angle-down"></i></a>
                @include('components.child_menu', ['categoryParent' => $categoryParent])
               
            </li> 
        @endforeach
        
        
        

        <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                <li><a href="{{ route('blog') }}">Blog List</a></li>
                
               
            </ul>
        </li> 
        <li><a href="{{route('error')}}">404</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>
    </ul>
</div>