@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('slider-add')
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2"> Add</a>
                        @endcan
                       
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Desciption</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $slider)

                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img class="image_slider_150_100" src="{{ $slider->image_path }}" alt="">

                                    </td>
                                    <td>
                                        @can('slider-edit')
                                        <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"
                                            class="btn btn-default">Edit</a>
                                        @endcan
                                       @can('slider-delete')
                                       <a href=""
                                       data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                       class="btn btn-danger action_delete">Delete</a>
                                       @endcan
                                        

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

