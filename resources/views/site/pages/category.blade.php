@extends('site.app')
@section('title', $category->name)
@section('content')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">{{ $category->name }}</h2>
    </div>
</section>
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Rikiuoti prekes
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Pigiausios viršuje</a>
      <a class="dropdown-item" href="#">Brangiausios viršuje</a>
    </div>
  </div>
<section class="section-content bg padding-y">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
                @forelse($category->products as $product)
                    <div class="col-md-4">
                        <figure class="card card-product">
                            @if ($product->images->count() > 0)
                                <div class="img-wrap padding-y"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></div>
                            @else
                                <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                            @endif
                            <figcaption class="info-wrap">
                                <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                            </figcaption>
                            <div class="bottom-wrap">
                                <a href="" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i> Buy Now</a>
                                @if ($product->sale_price != 0)
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                        <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                    </div>
                                @else
                                    <div class="price-wrap h5">
                                        <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                    </div>
                                @endif
                            </div>
                        </figure>
                    </div>
                @empty
                    <p>No Products found in {{ $category->name }}.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@stop