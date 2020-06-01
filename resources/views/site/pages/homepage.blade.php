@extends('site.app')
@section('title', 'Pradžia')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <h1 class="display-4">Sveiki!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
  </div>
<br>    
<h1 style="text-align: center">Naujausios prekės</h1>
    <section class="section-content bg padding-y">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    @forelse($products as $product)
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
                        <p>Šiuo metu nėra naujų prekių.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@stop