@extends('site.app')
@section('title', 'Checkout')
@section('content')
<section class="section-pagetop sm-light">
    <div class="container clearfix">
        <h1 class="title-page" style="text-align: center; color: black">Apmokėjimas</h1>
    </div>
</section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Apmokėjimo informacija</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Vardas</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}" required>
                                    </div>
                                    <div class="col form-group">
                                        <label>Pavardė</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Adresas</label>
                                    <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Miestas</label>
                                        <input type="text" class="form-control" name="city" value="{{ auth()->user()->city }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Šalis</label>
                                        <input type="text" class="form-control" name="country" value="{{ auth()->user()->country }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>Pašto kodas</label>
                                        <input type="text" class="form-control" name="post_code" required>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Telefono nr.</label>
                                        <input type="text" class="form-control" name="phone_number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>El. paštas</label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled required>
                                    <small class="form-text text-muted">Mes niekada nesidalinsime Jūsų el. paštu su kitais.</small>
                                </div>
                                <div class="form-group">
                                    <label>Papildomos užsakymo pastabos</label>
                                    <textarea class="form-control" name="notes" rows="6"></textarea>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Jūsų užsakymas</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Viso mokėti: </dt>
                                            <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Atlikti užsakymą</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop