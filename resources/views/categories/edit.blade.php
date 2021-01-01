@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('categories.update', ['category' => $category]) }}" method="post">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="text">Category name</label>
            <input type="text" class="form-control" id="text" name="text" placeholder="category text" value="{{ $category->text }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
