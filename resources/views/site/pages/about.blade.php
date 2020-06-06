@extends('site.app')
@section('title', 'Apie mane')

@section('content')
<section class="section-pagetop sm-light">
    <div class="container clearfix">
        {{ Breadcrumbs::render('about') }}
    </div>
</section>
<h1 style="text-align: center">Puslapis kuriamas...</h1>
@stop
