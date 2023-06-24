@extends('layouts.admin')

@section('title')
    <title>Blog</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection
@section('header')

@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Blog', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      
                        <a href="{{route('blogs.create')}}" class="btn btn-success float-right m-2">add</a>
                        
                        
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">image</th>
                                <th scope="col">content</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blog->id  }}</th>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                       
                                        <img class="product_image_150_100" src="{{ $blog->feature_image_path }}" alt="">
                                        
                                    </td>
                                    <td>{!! html_entity_decode($blog->content) !!}</td>
                                    <td>
                                       
                                        <a href="{{route('blogs.edit', ['id' => $blog->id])}}"
                                            class="btn btn-default">Edit</a>
                                       
                                       
                                           
                                            <a href=""
                                            data-url="{{ route('blogs.delete', ['id' => $blog->id]) }}"
                                            class="btn btn-danger action_delete">Delete</a>
 
                                            
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $blogs->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

