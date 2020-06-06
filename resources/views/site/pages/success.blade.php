@extends('site.app')
@section('title', 'Order Completed')
@section('content')
<section class="section-pagetop sm-light">
    <div class="container clearfix">
        <h1 class="title-page" style="text-align: center; color: black">Užsakymas priimtas!</h1>
    </div>
</section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-12">
                    <p class="alert alert-success">Jūsų užsakymas sėkmingai priimtas. Užsakymo numeris : {{ $order->order_number }}.</p></main>
            </div>
        </div>
    </section>
@stop