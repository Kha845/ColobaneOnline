<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{  config('app.name') }}-@yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet"
        href="{{asset('assets/app.css')}}">

    <body>
        {{--Barre de navigation--}}
        @include('navbar/navbar')
        {{--Toutes nos contenus seront afiiché ici--}}
       @yield('content')
       {{--include le script de javascript--}}
      @include('script')
    </body>
</html>
