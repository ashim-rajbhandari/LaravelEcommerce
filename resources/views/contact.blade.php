@extends('layouts.app')
@section('content')


<div class="container shadow" style="margin-top:100px;padding:10px 50px;">
    <h2 style="text-align:center;padding-bottom:10px;">Contact us</h2>
    
<form method="post" action="{{route('contactsend')}}" > 
    {{ csrf_field() }}
    
    @if(session('status'))
    <div class="alert alert-success">
    {{session('status')}}
    </div>
    @endif
    <div class="form-group">
      <label> Name</label>
     <input type="text" name="name" class="form-control">
      </div>
      <div>
      @error('name')  
      <span>{{$message}}</span>
      @enderror
      </div>
@guest   
       <div class="form-group">
        <label> Email</label>
       <input type="email" name="email" class="form-control">
        </div> 
        @error('email'){{$message}}  @enderror
        

 @endguest 

      <div class="form-group">
        <label> Subject</label>
       <input type="text" name="subject" class="form-control">
        </div>
        <div>
        @error('subject') <span>{{$message}}</span> 
        @enderror
        </div>
    <div class="form-group">
    <label> Message</label>
   <textarea name="message" class="form-control" rows="3"></textarea>
    </div>
    <div>
     @error('message'){{$message}}  <span>@enderror</span>
    </div>
    <input type="submit" value="Send" class="btn btn-primary">
  </form>

</div>
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