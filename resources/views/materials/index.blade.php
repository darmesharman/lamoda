@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Materials</h3>
    <div class="row m-3">
        <a href="{{ route('materials.create') }}" class="h5">Create Material</a>
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
            @foreach ($materials as $material)
                <tr>
                    <th scope="row">{{ $material->id }}</th>
                    <td>{{ $material->name }}</td>
                    <td>
                        <form action="{{ route('materials.edit', ['material' => $material]) }}" method="get">
                            @csrf

                            <button type="submit" class="btn btn-primary">edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('materials.destroy', ['material' => $material]) }}" method="post">
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
