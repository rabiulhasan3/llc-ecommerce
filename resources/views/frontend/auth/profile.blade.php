@extends('frontend.layouts.master')

@section('main')
    <div class="container">
        <br>
            <h5 class="text-center font-weight-bold">My Profile</h5>
        <hr>
       
    </div>
    <div class="container">
        <table class="table table-bordered-table-hover">
            <thead>
                <tr>
                    <th>Order id</th>
                    <th>Customer Name</th>
                    <th>Customer Phone Number</th>
                    <th>Total Ammount</th>
                    <th>Paid Ammount</th>
                    <th>See Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $orders as $order )
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_phone_number }}</td>
                        <td>{{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ number_format($order->paid_amount, 2) }}</td>
                        <td>
                            <a href="{{ route('order.details',$order->id) }}">Details</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>



@endsection