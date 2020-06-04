@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
=@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">Bendra</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.products.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Prekės informacija</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="name">Pavadinimas</label>
                                    <input
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Įveskite prekės pavadinimą"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="sku">Kodas</label>
                                            <input
                                                class="form-control @error('sku') is-invalid @enderror"
                                                type="text"
                                                placeholder="Įveskite prekės kodą"
                                                id="sku"
                                                name="sku"
                                                value="{{ old('sku') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('sku') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="brand_id">Brand</label>
                                            <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                                <option value="0">Select a brand</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('brand_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="control-label" for="categories">Kategorijos</label>
                                            <select name="categories[]" id="categories" class="form-control" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Kaina</label>
                                            <input
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Įveskite prekės kainą"
                                                id="price"
                                                name="price"
                                                value="{{ old('price') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="special_price">Speciali kaina</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Įveskite prekės specialią kainą"
                                                id="special_price"
                                                name="special_price"
                                                value="{{ old('special_price') }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="quantity">Kiekis</label>
                                            <input
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                type="number"
                                                placeholder="Įveskite prekės kiekį"
                                                id="quantity"
                                                name="quantity"
                                                value="{{ old('quantity') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('quantity') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="weight">Svoris (g)</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Įveskite prekės svorį"
                                                id="weight"
                                                name="weight"
                                                value="{{ old('weight') }}"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Aprašymas</label>
                                    <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="status"
                                                   name="status"
                                                />Statusas
                                        </label>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="featured"
                                                   name="featured"
                                                />Rodoma
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Išsaugoti prekę</button>
                                        <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Atgal</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#categories').select2();
        });
    </script>
@endpush