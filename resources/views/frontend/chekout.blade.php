@extends('frontend.layouts.master')

@section('main')
    <div class="container">
        <br>
            <h5 class="text-center">Checkout</h5>
        <hr>
        <div class="alert alert-info">
            You need to <a href="{{ route('login') }}">login</a> to your first order.
        </div>
    </div>
@endsection