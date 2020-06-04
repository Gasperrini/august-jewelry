@extends('admin.app')
@section('title') Administratoriaus tvarkyklė@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Administratoriaus tvarkyklė</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-bar-chart fa-3x"></i>
                <div class="info">
                    <h4>Užsakymų</h4>
                    <p><b>{{ $order_count->count() }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-shopping-bag fa-3x"></i>
                <div class="info">
                    <h4>Skirtingų prekių</h4>
                    <p><b>{{ $product_count->count() }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-tags fa-3x"></i>
                <div class="info">
                    <h4>Skirtingų kategorijų</h4>
                    <p><b>{{ $category_count->count() }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-th fa-3x"></i>
                <div class="info">
                    <h4>Atributų</h4>
                    <p><b>{{ $attribute_count->count() }}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection