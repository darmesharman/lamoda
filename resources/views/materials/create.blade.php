@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('materials.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Material name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="material name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
