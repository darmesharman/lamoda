@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-3">
        <a href="{{ route('roles.create') }}" class="h5">Create Role</a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <th scope="row">{{ $permission->id }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>
                        @if ($role->hasPermission($permission->name))
                            <form action="{{ route('roles.take_permission', ['role' => $role, 'permission' => $permission]) }}" method="post">
                                @csrf
                                @method('put')

                                <button type="submit" class="btn btn-danger">Take away</button>
                            </form>
                        @else
                            <form action="{{ route('roles.give_permission', ['role' => $role, 'permission' => $permission]) }}" method="post">
                                @csrf
                                @method('put')

                                <button type="submit" class="btn btn-success">Give</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
