@extends('layouts.app')

@section('content')
<div id="carousel-ex" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view" style="background-image: url('https://www.nyxcosmetics.com/dw/image/v2/AANG_PRD/on/demandware.static/-/Sites-nyxcosmetics-us-Library/en_US/dw5519c4a2/Homepage%20A1/20200924-US-ECOM-A1-GWP-LINER-POT-DESKTOP.jpg?sw=2000&q=70');
        background-repeat: no-repeat; background-size: cover;">
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1>
                            <strong>PROFESSIONAL SPECIAL EFFECTS MAKEUP</strong>
                        </h1>
                        <p class="mb-4 d-none d-md-block">
                            <strong>PAIR WITH OUR FAVORITE MAKEUP BRUSHES</strong>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="carousel-item">
            <div class="view" style="background-image: url('https://www.makeup.co.nz/images/339685/nyx_pro_makeup_banner_site_cf.png');
        background-repeat: no-repeat; background-size: cover;">
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1>
                            <strong>PROFESSIONAL SPECIAL EFFECTS MAKEUP</strong>
                        </h1>
                        <p class="mb-4 d-none d-md-block">
                            <strong>PAIR WITH OUR FAVORITE MAKEUP BRUSHES</strong>
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="carousel-item">
            <div class="view" style="background-image: url('https://www.chicmoey.com/wp-content/uploads/2019/12/NYX-COSMETICS-NEW-HIGH-GLASS-COLLECTION-EXCLUSIVE-TO-ULTA-742x450.png');
        background-repeat: no-repeat; background-size: cover;">
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1>
                            <strong>PROFESSIONAL SPECIAL EFFECTS MAKEUP</strong>
                        </h1>
                        <p class="mb-4 d-none d-md-block">
                            <strong>PAIR WITH OUR FAVORITE MAKEUP BRUSHES</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark mdb-color ligthen-3 mt-3 mb-5">
        <span class="navbar-brand">COLLECTION</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nextNav"
            aria-controls="nextNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="nextNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('items.index') }}" class="nav-link">View All</a>
                </li>
                @foreach ($cats as $cat)
                    <li class="nav-item">
                        <a href="{{ route('items.cat', $cat->id) }}" class="nav-link">{{ $cat->text }}</a>
                    </li>
                @endforeach
            </ul>

            <form action="{{ route('items.index') }}" method="get" class="form-inline">
                @csrf

                <div class="md-form">
                    <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search" aria-label="Search">
                </div>
            </form>
        </div>
    </nav>

    <section class="text-center mb-4">
        <h2>shop trending beauty products</h2>
        @can('item-permission')
            <div class="text-center my-3">
                <a href="{{route('items.create')}}" class="btn btn-outline-secondary">Create new Item</a>
            </div>
        @endcan
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('items.index') }}" class="nav-link border p-1 rounded bg-default text-white">latest</a>
                    <a href="{{ route('items.index', ['order' => 'price']) }}" class="nav-link border p-1 rounded bg-default text-white">by price</a>
                    <a href="{{ route('items.index', ['order' => 'random']) }}" class="nav-link border p-1 rounded bg-default text-white">random</a>
                </li>
            </ul>
        </div>
        <div class="row wow fadein">
            @foreach ($items as $item)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="view overlay">
                            <img class="card-img-top"
                                src="{{ asset($item->image) }}"
                                alt="{{ $item->name }}">
                            <a href="{{ route('items.show', $item->id) }}">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <div class="card-body text-center">

                            <a href="{{ route('items.show', $item->id) }}" class="black-text">
                                <h5>{{ $item->name }}</h5>
                            </a>
                            <a href="{{ route('items.show', $item->id) }}" class="black-text">{{ $item->price }} $</a>

                        </div>
                    </div>
                    @can('item-permission')
                        <a href="{{route('items.edit', $item->id)}}" class="btn btn-success">Edit</a>
                        <form class="form-delete" action="{{route('items.destroy', $item->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
