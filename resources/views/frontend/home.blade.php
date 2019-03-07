@extends('frontend.layouts.master')

@section('main')

@include('frontend.partials._hero')
          
            <div class="album py-5 bg-light">
              <div class="container">
          
                <div class="row">

                @foreach( $products as $product)
                  <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="#">
                            <img class="card-img-top" src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}">
                        </a>
                      <div class="card-body">

                        <p class="card-text">
                          {{ $product->title }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">

                            <button type="button" class="btn btn-sm btn-outline-secondary">
                              Add To Cart
                            </button>
                            
                          </div>

                          <small class="text-muted">BDT {{ $product->price }}</small>
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