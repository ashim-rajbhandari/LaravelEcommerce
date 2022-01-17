@extends('layouts.app')

@section('content')

<div id ="app">
   <h1 class="text-center"> Chat App</h1> 
   
 <example-component 

 v-for ="value,index in chat.message"
 :key = "value.index"
 v-bind:user = "chat.user[index]"
 :color = "chat.color[index]">
 
   @{{ value }}

</example-component>

<div class="input-group mb-3 container">
  <input type="text" class="form-control"  v-on:keyup.enter="send" v-model = "message">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button"  v-on:click ="send">Button</button>
  </div>
</div>


</div>
@endsection
