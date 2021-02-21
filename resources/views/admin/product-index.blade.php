@extends('layouts.app')

@section('content')


<div class="col-md-8 container shadow" style="margin-top:100px;padding:10px 50px;">
    <h2 style="text-align:center;padding-bottom:10px;">{{ __('Product') }}</h2>
    <p style="text-align: center"><a href="/admin/product/create"> Want to create new product? </a> </p>
    <ol>
    @foreach ($products as $product)
       
        <div>
        <li>{{$product->product_name}}</li>
         
        <div>
        <a href="/admin/product/{{ $product->id}}/edit" class="btn btn-primary">Edit</a>
        </div>

        <div>
        <form method="post" action="/admin/product/{{ $product->id}}">
            {{csrf_field()}}  
            {{method_field('DELETE')}}
            <input type="submit" value="delete" class="btn btn-danger"> 
        </form>
        </div>
        </div>
    @endforeach
</ol>
@endsection