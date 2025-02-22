<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    @include('layouts.topnav')
    @include('layouts.sidebar')
          <main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 py-4">
              @yield('content')
          </main>
        
        </div>
            <!--╥━━━━━━━━╭━━╮━━┳
                ╢╭╮╭━━━━━┫┃▋▋━▅┣
                ╢┃╰┫┈┈┈┈┈┃┃┈┈╰┫┣
                ╢╰━┫┈┈┈┈┈╰╯╰┳━╯┣
                ╢┊┊┃┏┳┳━━┓┏┳┫┊┊┣
                ╨━━┗┛┗┛━━┗┛┗┛━━┻-->
                <!--
                Designed & Developed By Biswas Sampad Satpathy 
                with Arch Technologies & media
                For Chancellor Grand,Bhubaneswar,Odisha
                 
                -->
        </body>
        </html>