@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')

@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection


@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('role-add')
                        <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2"> Add</a>
                        @endcan
                        
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">detail role</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($roles as $role)

                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>

                                    <td>
                                        @can('role-edit')
                                        <a href="{{ route('roles.edit', ['id' => $role->id]) }}"
                                            class="btn btn-default">Edit</a>
                                        @endcan
                                        @can('role-delete')
                                        <a href=""
                                        data-url="{{route('roles.delete',['id' => $role->id])}}"
                                        class="btn btn-danger action_delete">Delete</a>
                                        @endcan
                                       
                                        

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

