@extends('frontend.layouts.master')

@section('main')
<div class="container">
        <br>
        <p class="text-center">{{ $product->title }}</p>
        <hr>

        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div>
                            <img src="{{ $product->getFirstMediaUrl('products') }}" class="card-img-top" alt="{{ $product->title }}">
                        </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>

                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{ $product->title }}</h3>

                        <p class="price-detail-wrap">
                            <span class="price h3 text-warning">
                                <span class="num">
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
                                </span>
                            </span>
                        </p> <!-- price-detail-wrap .// -->

                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd>
                                <p>
                                    {{ $product->description }}
                                </p>
                            </dd>
                        </dl>

                        <hr>
                        <form action="{{ route('cart.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id}}">
                            <button type="submit" class="btn btn-lg btn-outline-secondary">
                                <i class="fas fa-shopping-cart"></i> Add To Cart
                            </button>
                          </form>

                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->

    </div>
    <!--container.//-->
@endsection