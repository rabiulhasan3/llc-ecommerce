@extends('frontend.layouts.master')

@section('main')
    <div class="container">
        <br>
            <h5 class="text-center">Login</h5>
        <hr>
        @include('frontend.partials._message')

        <form action="{{ route('login') }}" class="form" method="post" enctype="mu">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">
                    Login
                </button>
            </div>

        </form>
    </div>
@endsection