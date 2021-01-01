@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Roles</h3>
    <div class="row m-3">
        <a href="{{ route('roles.create') }}" class="h5">Create Role</a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
                <th scope="col">permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                    @if ($role->name != 'admin')
                        <td>
                            <form action="{{ route('roles.edit', ['role' => $role]) }}" method="get">
                                @csrf

                                <button type="submit" class="btn btn-primary">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('roles.destroy', ['role' => $role]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                        <td>
                            <dl>
                                @forelse ($role->permissions as $permission)
                                    <dt>{{ $permission->name }}</dt>
                                @empty
                                    no permissions
                                @endforelse
                            </dl>
                            <form action="{{ route('roles.permissions', ['role' => $role]) }}" method="get">
                                <button type="submit" class="btn btn-primary py-0">edit permissions</button>
                            </form>
                        </td>
                    @else
                        <td>
                            cannot edit
                        </td>
                        <td>
                            cannot delete
                        </td>
                        <td>
                            <dl>
                                @forelse ($role->permissions as $permission)
                                    <dt>{{ $permission->name }}</dt>
                                @empty
                                    no permissions
                                @endforelse
                            </dl>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
