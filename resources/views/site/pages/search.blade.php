@extends('site.app')
@section('title', 'Paieškos rezultatai')

@section('content')
<section class="section-pagetop sm-light">
    <div class="container clearfix">
        <h1 class="title-page" style="text-align: center; color: black">Prekių paieškos rezultatai:</h1>
    </div>
</section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-4">
                            <figure class="card card-product">
                                @if ($product->images->count() > 0)
                                    <div class="img-wrap padding-y"><a href="{{ route('product.show', $product->slug) }}"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></a></div>
                                @else
                                    <div class="img-wrap padding-y"><a href="{{ route('product.show', $product->slug) }}"><img src="https://via.placeholder.com/176" alt=""></a></div>
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
                        <p>Prekių nerasta...</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    {{ $products->links() }}
@stop