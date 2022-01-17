@extends('layouts.app')

@section('content')
{{-- carousel --}}
  <!-- <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('storage/photos/logo.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1>Big sale on football kits</h1>
        <a href class="btn btn-primary">Explore</a>
        </div>
      </div>
      <div class="carousel-item">
       <img src="{{asset('storage/photos/logo.jpg')}}" class="d-block w-100" alt="...">
       <div class="carousel-caption d-none d-md-block">
        <h1>Big sale on football jersey</h1>
      <a href class="btn btn-primary">Explore</a>
      </div>
      </div>
      <div class="carousel-item">
       <img src="{{asset('storage/photos/logo.jpg')}}" class="d-block w-100" alt="...">
       <div class="carousel-caption d-none d-md-block">
        <h1>Big sale on football shoes</h1>
      <a href class="btn btn-primary">Explore</a>
      </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>  -->

{{-- new category --}}

 <!-- <h3>New category</h3>  -->
<div class="container"  style="margin-top:60px;">
<h3 class="title"> Digital Product </h3>
   <div class="card-deck">
   <img src="{{asset('storage/photos/seeds.png')}}" class="card-img-top" alt="no image">
    @foreach($digital as $d) 
    <div class="card shadow-sm round" >
      <form method="post" action="{{route('product.store',[$d->id])}}">
        {{ csrf_field() }} 
      <img src="{{asset('storage/photos/seeds.png')}}" class="card-img-top" alt="">
      <div class="card-body">
        @if($d->product_quantity!= 0)
      <h5 class="card-title"><a href="">{{$d->product_name}}</a></h5>
      <p class="card-text">price: {{$d->product_price}}</p>
        @auth
      <p class="card-text"><input type="number" name="qt" value="1"></p>
        
       <input class="card-text btn btn-primary" type="submit" value="Add to cart">
@endauth
       @guest
       <p class="card-text"> Login to buy </p>  
       @endguest
       @else
              <h5 class="card-title">{{$d->product_name}}</a></h5>
              <p class="card-text">price: {{$d->product_price}}</p>
              <h1 class="card-text">Sold</h1>
              
               @endif
      
      
      
      </div>
    </form>
    </div> 
    
@endforeach
  </div> 
    
</div>


{{-- best seller --}}

<div class="container"  style="margin-top:60px;">
  <h3 class="title"> Summer Trend </h3>
     <div class="card-deck">
         
      @foreach($summer as $s) 
      <div class="card" >
        <form method="post" action="{{route('product.store',[$s->id])}}">
          {{ csrf_field() }} 
        <img src="{{asset('storage/photos/seeds.png')}}" class="card-img-top" alt="">
        <div class="card-body">
          @if($s->product_quantity!= 0)
        <h5 class="card-title"><a href="">{{$s->product_name}}</a></h5>
        <p class="card-text">price: {{$s->product_price}}</p>
        @auth      
          
        <p class="card-text"><input type="number" name="qt" value="1"></p>
          
         <input class="card-text btn btn-primary" type="submit" value="Add to cart">
         @endauth
         @guest
               <p class="card-text"> Login to buy </p>  
               @endguest

         @else
              <h5 class="card-title">{{$s->product_name}}</a></h5>
              <p class="card-text">price: {{$s->product_price}}</p>
              <h1 class="card-text">Sold</h1>
              
               @endif
        </div>
      </form>
      </div> 
      
  @endforeach
     </div>
</div>   

{{-- end of best seller --}}


{{-- summer collection without using card deck --}}
 

@endsection

@section('footer')
<div class="container-fluid shadow-sm round bg-dark" style="margin-top: 60px;">
  <div class="row" style="padding-bottom:20px;padding-top:20px;color:white">
    <div class="about col">
      <div style="padding-left: 100px">
      <h2>About us</h2>
      <p> nothing to say,just buy it</p>
    </div>
    </div>

    <div class="logo col" >
      <h2 class="logo" style="margin-left:40%;margin-top:10%"> SalesBay</h2>
    </div>
  
    <div class="social col text-center" >
      <ul>
        <h3>Follow us </h3>
        <li  class="f" style="list-style: none" >facebook</li>
        <li class="f" style="list-style: none">instagram</li>
        <li  class="f" style="list-style: none">whatsapp</li>
        <li  class="f" style="list-style: none">youtube</li>
        
      </ul>
    </div>
  </div>
  
  </div>
  @endsection