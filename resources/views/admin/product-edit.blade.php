@extends('layouts.app')

@section('content')


<div class="col-md-8 container shadow" style="margin-top:100px;padding:10px 50px;">
    <h2 style="text-align:center;padding-bottom:10px;">{{ __('Product Edit ') }}</h2>
    
<form method="POST" action="/admin/product/{{$product->id}}">
    @csrf
    @method('PATCH')

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input value="{{$product->product_name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

        <div class="col-md-6">
            <input value="{{$product->product_price}}" id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required>

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

        <div class="col-md-6">
            <input value="{{$product->category}}" id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" required autocomplete="new-category">

            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

        <div class="col-md-6">
            <input value="{{$product->product_quantity}}" id="quantity" type="number" class="form-control" name="quantity" required>
        </div>
    </div>

  

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>


@endsection