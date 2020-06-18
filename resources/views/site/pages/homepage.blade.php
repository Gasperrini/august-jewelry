@extends('site.app')
@section('title', 'Pradžia')

@section('content')

<div class="jumbotron jumbotron-fluid" style="color: rgb(64,64,64); padding-left:40px">
    <h1 class="display-4"><b>Sveiki!</b></h1>
    <p class="lead"><b>Esu Augustė Rugpjūtė ir kuriu unikalius, eksperimentinius bei šiuolaikiškus juvelyrinius dirbinius iš</b></p>
    <p class="lead"><b>sidabro, aukso, brangakmenių, netradicinių medžiagų, spalvotųjų metalų bei juvelyrinio emalio..</b></p>
    <p><i>Ne viskas auksas, kas auksu žiba...</i></p>
    <p class="lead">
      <a class="btn btn-secondary btn-lg" style="background-color: grey; outline" href="/about" role="button">Plačiau apie mane</a>
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
                                    <div class="img-wrap"><a href="{{ route('product.show', $product->slug) }}"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></a></div>
                                @else
                                    <div class="img-wrap"><a href="{{ route('product.show', $product->slug) }}"><img src="https://via.placeholder.com/176" alt=""></a></div>
                                @endif
                                <figcaption class="info-wrap">
                                    <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                    @if ($product->sale_price > 0)
                                            <var class="price h5 text-danger">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->sale_price }}</span>
                                                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>
                                            </var>
                                        @else
                                            <var class="price h5 text-success">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->price }}</span>
                                            </var>
                                        @endif
                                </figcaption>
                                <div class="bottom-wrap">
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline" style="float: inline-end">
                                                    <dt>Kiekis: </dt>
                                                    <dd style="padding-right:5px">
                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                                                    </dd>
                                                    <button type="submit" class="btn btn-bg btn-success float-right"><i class="fas fa-shopping-cart"></i> Pirkti</button>
                                                </dl>
                                            </div>
                                        </div>
                                    </form>
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