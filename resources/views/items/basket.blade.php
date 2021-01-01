@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Basket</h3>
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
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Price</th>
                <th scope="col">Remove</th>
                <th scope="col">Buy</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->item->name }}</td>
                    <td>{{ $order->item->price }}</td>
                    <td>
                        <form action="{{ route('orders.destroy', ['order' => $order]) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-primary">Remove</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('orders.update', ['order' => $order]) }}" method="post">
                            @csrf
                            @method('put')

                            <button type="submit" class="btn btn-success">Buy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
