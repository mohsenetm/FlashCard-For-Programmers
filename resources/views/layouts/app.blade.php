<head>
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@livewireStyles
</head>
<div class="container">
    @auth()
        @yield('menu', View::make('menu'))
    @endauth
</div>
@yield('content')
@livewireScripts
@yield('script')
