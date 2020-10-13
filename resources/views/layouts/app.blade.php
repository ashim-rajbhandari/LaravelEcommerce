<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        
       
</head>
    <body>
      <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark shadow-sm round">
           <a class="navbar-brand" href="/home">SalesBar</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavDropdown">
             <ul class="navbar-nav">
               <li class="nav-item active">
                 <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
             </li>
       
       
               <li class="nav-item">
                 <a class="nav-link" href="{{ route('product') }}">{{ __('Product') }}</a>
             </li>
           </ul>
       
             <ul class="navbar-nav ml-auto">
               
               {{-- <input type="text" placeholder="Search"> --}}
             @auth
               <li class="nav-item">
               <a class="nav-link" href="{{ route('cart') }}">{{ __('Cart') }}</a>
           </li>
       
       
       
           <li class="nav-item dropdown">
           <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              Notification <span class="caret"></span>
           </a>

           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              @if(count( Auth::user()->unreadNotifications))
               <a  class="dropdown-item" href="/read">Mark as all read </a>
               @foreach( Auth::user()->unreadNotifications as $notification )

               <a  class="dropdown-item">  {{$notification->data['data']}}</a>
               
               @endforeach
               @endif
           </div>
       </li>
               @endauth
       
               
               @guest
               <li class="nav-item">
                   <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
               </li>
               @if (Route::has('register'))
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                   </li>
               @endif
           @else
               <li class="nav-item dropdown">
                   <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       {{ Auth::user()->name }} <span class="caret"></span>
                   </a>
       
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>
       
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                   </div>
               </li>
           @endguest
             </ul>
           </div>
         </nav>

         <div style="margin-top:53px;">
            @yield('content')
       </div>
    </div>
    <div class="container-fluid shadow-sm round bg-dark" style="margin-top: 60px;">
        <div class="row" style="padding-bottom:20px;padding-top:20px;color:white">
          <div class="about col">
            <div style="padding-left: 100px">
            <h2>About us</h2>
            <p> nothing to say,just buy it</p>
          </div>
          </div>
    
          <div class="logo col" >
            <h2 class="logo" style="margin-left:40%;margin-top:10%"> SalesBar</h2>
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
</body>
</html>
