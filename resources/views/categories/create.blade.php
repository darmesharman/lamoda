@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Category name</label>
            <input type="text" class="form-control" id="text" name="text" placeholder="category name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
