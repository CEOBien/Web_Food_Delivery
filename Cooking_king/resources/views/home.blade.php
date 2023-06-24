@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
    
@endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name' => 'Home', 'key' => 'home'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-12">
                        Trang chu

                    </div>

                </div>
                <div class="row">
                    <div class="caster">
                        <img  style="max-width: 100%" src="https://scontent.fsgn2-2.fna.fbcdn.net/v/t1.6435-9/162183869_772491877026472_6084391054237794033_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=e3f864&_nc_ohc=_HF1KcNySWsAX8ttAar&_nc_ht=scontent.fsgn2-2.fna&oh=60970417e40b17f6a616ca49fa851b1c&oe=61990E4A" alt="">
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

