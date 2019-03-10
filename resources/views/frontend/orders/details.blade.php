@extends('frontend.layouts.master')

@section('main')
    <div class="container">
        <br>
            <h5 class="text-center font-weight-bold">{{ auth()->user()->name }} Order Details</h5>
        <hr>       
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
    </div>

@endsection