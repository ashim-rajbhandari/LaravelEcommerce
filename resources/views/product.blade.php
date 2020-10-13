@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top:100px">
    <h2 style="text-align:center">Products</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-10">
            <h2>{{$sort}}</h2>
            </div>
            <div class="col">    
                <div class="dropdown">
                    <a id="Dropdown" class="dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Sort by <span class="caret"></span>
                    </a>
        
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Dropdown">
                        <a class="dropdown-item" href="/product">Default</a>
                    <a class="dropdown-item" href="/product/sort/min">Low to high</a>
                    <a class="dropdown-item" href="/product/sort/max">high to  low</a>
        
                       
                    </div>
                </div> 
                  
                    
            </div>
        </div>
    </div>
        


        
        {{-- <div class="container ">
       <div class="row">
            @foreach($products as $p) 
           <div class="col-3">
            <div class="card shadow-sm round" style="margin-bottom:15px;" >
              <form method="post" action="{{route('product.store',[$p->id])}}">
                {{ csrf_field() }} 
              <img src="{{asset('storage/photos/seeds.png')}}" class="card-img-top" alt="">
              
              <div class="card-body">
               @if($p->product_quantity!=0)   
              <h5 class="card-title"><a href="">{{$p->product_name}}</a></h5>
              <p class="card-text">price: {{$p->product_price}}</p>
               @auth
                
              <p class="card-text"><input type="number" name="qt" value="1"></p>
                
               <input class="card-text btn btn-primary" type="submit" value="Add to cart">
               @endauth
               @guest
               <p class="card-text"> Login to buy </p>  
               @endguest

              @else
              <h5 class="card-title">{{$p->product_name}}</a></h5>
              <p class="card-text">price: {{$p->product_price}}</p>
              <h1 class="card-text" style="padding-top:40px">Sold</h1>
              
               @endif
            </div>
            
            
            </form>
            </div> 
           </div>
        @endforeach
       </div>
       </div> --}}
<div class="container">
       <div class="card-deck">
       
        @foreach($products->chunk(5) as $chunk)
        <div class="row">
            @foreach ($chunk as $p)
                
            
        <div class="card shadow-sm round" style="margin-bottom: 15px;">
          <form method="post" action="{{route('product.store',[$p->id])}}">
            {{ csrf_field() }} 
          <img src="{{asset('storage/photos/seeds.png')}}" class="card-img-top" alt="">
          <div class="card-body">
            @if($p->product_quantity!= 0)
          <h5 class="card-title"><a href="">{{$p->product_name}}</a></h5>
          <p class="card-text">price: {{$p->product_price}}</p>
            @auth
          <p class="card-text"><input type="number" name="qt" value="1"></p>
            
           <input class="card-text btn btn-primary" type="submit" value="Add to cart">
    @endauth
           @guest
           <p class="card-text"> Login to buy </p>  
           @endguest
           @else
                  <h5 class="card-title">{{$p->product_name}}</a></h5>
                  <p class="card-text">price: {{$p->product_price}}</p>
                  <h1 class="card-text">Sold</h1>
                  
                   @endif
          
          
          
          </div>
        </form>
        </div> 
        @endforeach </div>
    @endforeach
      </div> 
</div>
    </div>

    </div>    

@endsection