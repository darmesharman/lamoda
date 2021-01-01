@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('roles.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Role name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="role name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
