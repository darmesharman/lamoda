@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Users</h3>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">delete</th>
                <th scope="col">roles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    @if ($user->id != Auth::id())
                        <td>
                            <form action="{{ route('users.destroy', ['user' => $user]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                        <td>
                            <dl>
                                @forelse ($user->roles as $role)
                                    <dt>{{ $role->name }}</dt>
                                @empty
                                    no roles
                                @endforelse
                            </dl>
                            <form action="{{ route('users.roles', ['user' => $user]) }}" method="get">
                                <button type="submit" class="btn btn-primary py-0">edit roles</button>
                            </form>
                        </td>
                    @else
                        <td>
                            cannot delete
                        </td>
                        <td>
                            <dl>
                                @forelse ($user->roles as $role)
                                    <dt>{{ $role->name }}</dt>
                                @empty
                                    no roles
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
