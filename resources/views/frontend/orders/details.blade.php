@extends('frontend.layouts.master')

@section('main')
    <div class="container">
        <br>
            <h5 class="text-center font-weight-bold">{{ auth()->user()->name }} Order Details</h5>
        <hr> 
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>      
        @endif
    </div>
    <div class="container">
      
        <h3>Order id : {{ $order->id }}</h3>
        <ul class="list-group">

            @foreach ( $order->toArray() as $column => $value)
                @if( $column === 'user_id')
                    @continue
                @endif

                <li class="list-group-item">{{ ucwords( str_replace('_',' ',$column)) }} : {{ $value }}</li>
            @endforeach
        </ul>

        <div class="mt-5"></div>
        <h3>Order Products</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Qantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->products as $product )
                    <tr>
                        <td>{{ $product->product->title }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ number_format($product->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection