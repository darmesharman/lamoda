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
                            <h2>Edit a item with ID {{$item->id}}</h2>
                            <div class="ml-auto">
                                <a href="{{route('items.index')}}" class="btn btn-outline-secondary">Back to all Items</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('items.update', $item->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="item-name">Name</label>
                                <input type="text" value="{{$item->name}}" name="name" id="item-name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="item-price">Price</label>
                                <input type="text" value="{{$item->price}}" name="price" id="item-price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="item-size">Size</label>
                                <input type="text" value="{{$item->size}}" name="size" id="item-size" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="item-brand">Brand</label>
                                <input type="text" value="{{$item->brand}}" name="brand" id="item-brand" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="item-category">Category</label>
                                <select name="category_id" id="item-category" class="form-control form-control-lg">
                                    @foreach($cats as $cat)
                                        @if($cat->id == $item->category->id)
                                            <option value="{{$cat->id}}" selected>{{$cat->text}}</option>
                                        @else
                                            <option value="{{$cat->id}}">{{$cat->text}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="item-materials">Materials</label>
                                <select name="materials[]" id="item-materials" class="form-control form-control-lg" multiple>
                                    @foreach($materials as $material)
                                        <option value="{{$material->id}}">{{$material->name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="item-materials" place>Текст</label>
                                <select name="materials[]" class="form-control form-control-lg" id="item-materials" multiple>
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}"
                                            @foreach ($material->items as $material_item)
                                                @if ($material_item->id == $item->id)
                                                    selected
                                                    @break
                                                @endif
                                            @endforeach
                                            >
                                            {{ $material->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
