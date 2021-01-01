@extends('layouts.app')

@section('head-content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Create a new item</h2>
                            <div class="ml-auto">
                                <a href="{{route('items.index')}}" class="btn btn-outline-secondary">Back to all Items</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="item-name">Name</label>
                                <input type="text" name="name" id="item-name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="item-price">Price</label>
                                <input type="text" name="price" id="item-price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="item-size">Size</label>
                                <input type="text" name="size" id="item-size" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="item-brand">Brand</label>
                                <input type="text" name="brand" id="item-brand" class="form-control">
                            </div>


                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}" class="form-control">

                            <div class="form-group">
                                <label for="item-category">Category</label>
                                <select name="category_id" id="item-category" class="form-control form-control-lg">
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->text}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="item-materials">Materials</label>
                                <select name="materials[]" id="item-materials" class="form-control form-control-lg" multiple>
                                    @foreach($materials as $material)
                                        <option value="{{$material->id}}">{{$material->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
