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