<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{  config('app.name') }}-@yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/app.css')}}">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <body style="background-color:rgb(121, 122, 126)">
        {{--Barre de navigation--}}
       {{--@include('navbar/navbar')--}}
        {{--Toutes nos contenus seront afiiché ici--}}
       @yield('content')
       {{--include le script de javascript--}}
      @include('script')
      <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
