@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="row mt-3">
                <div class="col-md-7">
                    <img src="{{ asset($item->image) }}" alt="" style="max-width: 600px">
                </div>
                <div class="col-md-5">
                    <div class="col-md-12 text-center">
                        <h5>{{$item->name}}</h5>
                    </div>

                    <div class="col-md-12 text-center">
                        <h6>{{$item->size}}</h6>
                    </div>

                    <div class="col-md-12 text-center text-muted">
                        <p>Price: {{$item->price}} $</p>
                    </div>

                    <div class="col-md-12 text-center">
                        <h5><span class="bg-dark px-2 border rounded text-white">{{$item->brand}}</span></h5>
                    </div>

                    <div class="col-md-6 offset-3 mt-4">
                        <b>Materials:</b>
                        <ul>
                            @foreach($item->materials as $material)
                                <li>{{$material->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="col-md-6 offset-6 mt-5">
                        <b>User:</b> {{$item->user->name}}
                    </div> --}}
                    <div class="text-center mt-5 d-flex justify-content-around">
                        {{-- <a href="{{route('items.index')}}" class="btn btn-primary">GO BACK</a> --}}
                        <form action="{{ route('orders.store') }}" method="post" class="d-inline">
                            @csrf

                            <input type="hidden" name="item" value="{{ $item->id }}">
                            <input type="submit" name="order" class="btn btn-info text-white text-uppercase" value="ADD TO BASKET">
                            <input type="submit" name="order" class="btn btn-success text-uppercase" value="BUY NOW">
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h4>Reviews:</h4>
                @auth
                    <form action="{{ route('reviews.store') }}" method="post">
                        @csrf

                        <div class="row justify-content-center m-3">
                            <input type="hidden" name="item" value="{{ $item->id }}">
                            <div class="col-10">
                                <input type="text" name="text" class="form-control" placeholder="write your review">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">send review</button>
                            </div>
                        </div>
                    </form>
                @endauth
                @foreach ($reviews as $review)
                    <div class="row m-1">
                        <div class="col">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h5 class="card-title">{{ $review->user->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $review->user->email }}</h6>
                                    <p class="card-text">{{ $review->text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
