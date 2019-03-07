@extends('frontend.layouts.master')

@section('main')

@include('frontend.partials._hero')
          
            <div class="album py-5 bg-light">
              <div class="container">
          
                <div class="row">

                @foreach( $products as $product)
                
                  
                  <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ route('product.details',$product->slug) }}">
                            <img class="card-img-top" src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}">
                        </a>
                      <div class="card-body">

                        <p class="card-text">
                          <a href="{{ route('product.details',$product->slug) }}">
                              {{ $product->title }}
                          </a>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <form action="{{ route('cart.add')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $product->id}}">
                              <button type="submit" class="btn btn-sm btn-outline-secondary">
                                  Add To Cart
                                </button>
                            </form>
                          </div>
                          @if($product->sale_price && $product->sale_price > 0)
                            
                              <small class="text-muted">
                                  <strike>
                                    BDT {{ $product->price }}
                                  </strike> 
                                  <br>
                                  BDT {{ $product->sale_price }}
                            </small>
                          @else
                             <small class="text-muted">BDT {{ $product->price }}</small>
                          @endif

                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  
                </div>
                <div class="row">
                  {{ $products->render() }}
                </div>
              </div>
            </div>

      @stop