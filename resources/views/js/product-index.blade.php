@extends('layouts.app')

@section('content')


<div id ="product_index" class="col-md-8 container shadow" style="margin-top:100px;padding:10px 50px;">
    <h2 style="text-align:center;padding-bottom:10px;">{{ __('JS-Product index') }}</h2>
    <p style="text-align: center"><a href="/admin/product/create"> Want to create new product? </a> </p>
    <div id="list">
    <ol>
    @foreach ($products as $product)
       
        <div>
        <li>{{$product->product_name}}</li>
         
        <div>
        <a href="/admin/product/{{ $product->id }}/edit" class="btn btn-primary edit">Edit</a>
        </div>

        <div>
        <form class="form-delete">
            @csrf
           {{method_field('DELETE')}} 
            <input type="hidden" value="{{ $product->id }}" id="id{{ $product->id}}">
            <input type="submit" value="delete" class="btn btn-danger"> 
        </form>
        </div>
        </div>
    @endforeach
</ol>
    </div>
@endsection