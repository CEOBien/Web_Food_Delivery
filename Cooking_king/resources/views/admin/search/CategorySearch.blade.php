@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection
@section('header')
@include('partials.header-category')
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'category', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                               
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($category as $categorySearch)
                                <tr>
                                    <th scope="row">{{ $categorySearch->id  }}</th>
                                    <td>{{ $categorySearch->name }}</td>
                                   
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $categorySearch->id]) }}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{ route('product.delete', ['id' => $categorySearch->id]) }}"
                                           class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                   

                </div>
            </div>
        </div>

    </div>

@endsection

