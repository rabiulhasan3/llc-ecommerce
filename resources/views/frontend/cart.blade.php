@extends('frontend.layouts.master')

@section('main')
    <div class="container">
        <br>
        <h5 class="text-center">Cart</h5>
        <hr>
        @if( session()->has('message'))
          <div class="alert alert-success">
            {{ session()->get('message') }}
          </div>
        @endif

        @if(empty($cart))
          <div class="alert alert-info">
            Please add product on your cart. <a href="{{ route('frontend.home') }}">Browse product.</a>
          </div>

        @else
        <table class="table table-bordered">
                <thead class="thead-dark bg-info">
                  <tr>
                        <td>Serial</td>
                        <td>Products</td>
                        <td>Unit Price</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                        @php
                        $i = 1;
                    @endphp
                    @foreach( $cart as $key=>$product)
                       <tr>
                            <td>{{ $i++}}</td>
                            
                            <td>{{ $product['title'] }}</td>
                            <td>{{ number_format($product['unit_price'], 2) }}</td>
                            <td>
                              <input type="number" name="quantity" value="{{ $product['quantity'] }}">
                            </td>
                            <td>{{ number_format($product['total_price']) }}</td>
                            <td>
                                <form action="{{ route('cart.remove')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="product_id" value="{{ $key}}">
                                  <button type="submit" class="btn btn-sm btn-outline-secondary">
                                      Remove
                                    </button>
                                </form>
                            </td>
                       </tr>
                    @endforeach
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Total : </td>
                      <td>BDT {{ number_format($total, 2)}}</td>
                      <td></td>
                    </tr>

                    

                </tbody>
              </table>
              <div>
                  <a href="{{ route('cart.clear') }}" class="btn btn-danger">
                      Clear
                    </a>
                    <a href="{{ route('cart.chekout') }}" class="btn btn-success">Checkout</a>
              </div>
              @endif

    </div>
@endsection
