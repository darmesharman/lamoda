@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Purchases history</h3>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Price</th>
                <th scope="col">Remove</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
