@extends('site.app')
@section('title', $product->name)
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">{{ $product->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    @if ($product->images->count() > 0)
                                        <div class="img-big-wrap">
                                            <div class="padding-y">
                                                <a href="{{ asset('storage/'.$product->images->first()->full) }}" data-fancybox="" id="currentImage">
                                                    <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="" id="currentImage">
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="img-big-wrap">
                                            <div>
                                                <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>
                                            </div>
                                        </div>
                                    @endif
                                     @if ($product->images->count() > 0)
                                        <div class="img-small-wrap">
                                            @foreach($product->images as $image)
                                                <div class="item-gallery">
                                                    <img src="{{ asset('storage/'.$image->full) }}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </article>
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <dl class="row">
                                        <dt class="col-sm-3">Svoris (g)</dt>
                                        <dd class="col-sm-9">{{ $product->weight }}</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Prekės aprašymas</dt>
                                        <dd class="col-sm-9">{!! $product->description !!}</dd>
                                    </dl>
                                    <div class="mb-3">
                                        @if ($product->sale_price > 0)
                                            <var class="price h3 text-danger">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->sale_price }}</span>
                                                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>
                                            </var>
                                        @else
                                            <var class="price h3 text-success">
                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->price }}</span>
                                            </var>
                                        @endif
                                    </div>
                                    <hr>
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    @foreach($attributes as $attribute)
                                                        @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                                        @if ($attributeCheck)
                                                            <dt>{{ $attribute->name }}: </dt>
                                                            <dd>
                                                                <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                                    <option data-price="0" value="0"> Pasirinkite {{ $attribute->name }}</option>
                                                                    @foreach($product->attributes as $attributeValue)
                                                                        @if ($attributeValue->attribute_id == $attribute->id)
                                                                            <option
                                                                                data-price="{{ $attributeValue->price }}"
                                                                                value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </dd>
                                                        @endif
                                                    @endforeach
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <dl class="dlist-inline">
                                                    <dt>Kiekis: </dt>
                                                    <dd>
                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Pridėti į krepšelį</button>
                                    </form>
                                </article>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <article class="card mt-4">
                        <h3 class="title mb-3">Prekės aprašymas</h3>
                        <div class="card-body">
                            {!! $product->description !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <h1 style="text-align: center">Jums taip pat gali patikti:</h1>
        <section class="section-content bg padding-y">
            <div class="container">
                <div id="code_prod_complex">
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-md-4">
                                <figure class="card card-product">
                                    @if ($product->images->count() > 0)
                                        <div class="img-wrap"><a href="{{ route('product.show', $product->slug) }}"><img src="{{ asset('storage/'.$product->images->first()->full) }}" alt=""></div>
                                    @else
                                        <div class="img-wrap"><a href="{{ route('product.show', $product->slug) }}"><img src="https://via.placeholder.com/176" alt=""></div>
                                    @endif
                                    <figcaption class="info-wrap">
                                        <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                    </figcaption>
                                    <div class="bottom-wrap">
                                        <a href="" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i> Pirkti</a>
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
    </section>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>
@endpush