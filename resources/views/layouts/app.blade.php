<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Salesbay') }}</title>

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
           <a class="navbar-brand" href="/home">SalesBay</a>
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
              Notification - <span class="badge">{{ auth()->user()->unreadNotifications->count() }}</span> <span class="caret"></span>
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

    @yield('footer')
</body>
</html>
