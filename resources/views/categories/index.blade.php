@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Categories</h3>
    <div class="row m-3">
        <a href="{{ route('categories.create') }}" class="h5">Create Category</a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->text }}</td>
                    <td>
                        <form action="{{ route('categories.edit', ['category' => $category]) }}" method="get">
                            @csrf

                            <button type="submit" class="btn btn-primary">edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
