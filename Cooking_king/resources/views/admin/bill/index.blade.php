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

@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'bill', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12">
                        <a href="" class="btn btn-success float-right m-2">Add</a>
                    </div> --}}
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name customer</th>
                                <th scope="col">Address</th>
                                <th scope="col">name food</th>
                                <th scope="col">quantity</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($dataBills as $dataBill)
                                <tr>
                                    <th scope="row">{{ $dataBill->id  }}</th>
                                    <td>{{ $dataBill->name }}</td>
                                    <td>{{ $dataBill->address }}</td>
                                    <td>{{$dataBill->name_food}}</td>
                                    <td>
                                        {{$dataBill->quantity}}
                                    </td>
                                    <td>{{ $dataBill->created_at}}</td>
                                    <td>{{$dataBill->status}}</td>
                                    <td>
                                        <a href=""
                                           class="btn btn-default">proccess</a>
                                        <a href=""
                                           data-url=""
                                           class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="col-md-12">
                        {{ $dataBills->links() }}
                    </div> --}}

                </div>
            </div>
        </div>

    </div>

@endsection

