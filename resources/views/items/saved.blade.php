@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="col-md-12 text-center">
                        <h2>Created item with category: {{$cat}}</h2>
                        <h3>And name: {{$name}}</h3>
                        <h3>And price: {{$price}}</h3>
                        <h3>And size: {{$size}}</h3>
                        <h3>And brand: {{$brand}}</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center my-3">
                            <a href="{{route('items.index')}}" class="btn btn-outline-secondary">Back to all items</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
