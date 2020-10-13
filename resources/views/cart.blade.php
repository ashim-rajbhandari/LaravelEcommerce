@extends('layouts.app')

@section('content')
<div class="container text-center" style="margin-top:100px">
  <h2>My Cart</h2>
</div>

  

    <table class="table container shadow table-borderless text-center">
     
        <tr>
          <th> name </th>
          <th> price </th>
          <th> quantity </th>
        </tr>
        <tr>
      @foreach($product as $p)
        @if($p->pivot->checkout == 0 && $p->product_quantity != 0) 
       
          <tr>
            <td>{{ $p->product_name}}</td>
            <td>{{$p->pivot->price}}</td>
            <td>{{$p->pivot->quantity}}</td>
            <td>    
              <form method="post" action="{{route('cart.destroy',[$p->pivot->id])}}"> 
                {{ csrf_field() }}
                {{method_field('DELETE')}}
                <input type="submit" value="delete" class="btn btn-primary">
              </form>
            </td>
          </tr>
          @elseif($p->pivot->checkout == 0 && $p->product_quantity == 0)
          <tr>
            <td>{{ $p->product_name}}</td>
            <td>{{$p->pivot->price}}</td>
            <td>{{$p->pivot->quantity}}</td>
            <td>  already sold<td>
          <tr>
          <br>
       @endif
       
     @endforeach
        </table>

  <div class="container text-right">
    <strong>Total price</strong> : {{$total}} <br>
    <a href="/checkout"><input type="button" value="check out" class="btn btn-success"></a>
  </div>

@endsection