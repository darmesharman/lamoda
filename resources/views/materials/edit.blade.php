@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('materials.update', ['material' => $material]) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Role name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="material name" value="{{ $material->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
