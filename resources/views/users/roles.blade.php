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
            @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        @if ($user->hasRole($role->name))
                            <form action="{{ route('users.take_role', ['user' => $user, 'role' => $role]) }}" method="post">
                                @csrf
                                @method('put')

                                <button type="submit" class="btn btn-danger">Take away</button>
                            </form>
                        @else
                            <form action="{{ route('users.give_role', ['user' => $user, 'role' => $role]) }}" method="post">
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
