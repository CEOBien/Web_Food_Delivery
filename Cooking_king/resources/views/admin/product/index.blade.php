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
@include('partials.header-product')
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'product', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('product-add', Model::class)
                        <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
                        @endcan
                        
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $productItem)
                                <tr>
                                    <th scope="row">{{ $productItem->id  }}</th>
                                    <td>{{ $productItem->name }}</td>
                                    <td>{{ number_format((float)$productItem->price), 2 }}$</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}" alt="">
                                    </td>
                                    <td>{{ optional($productItem->category)->name }}</td>
                                    <td>
                                        @can('product-edit')
                                        <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                            class="btn btn-default">Edit</a>
                                        @endcan
                                       @can('product-delete')
                                       <a href=""
                                       data-url="{{ route('product.delete', ['id' => $productItem->id]) }}"
                                       class="btn btn-danger action_delete">Delete</a>
                                       @endcan
                                        

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->appends($_GET)->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

