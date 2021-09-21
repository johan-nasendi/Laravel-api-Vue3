<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> CodeKeras </title>
        <link rel="shortcut icon" href="{{asset('favicons.png')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('css/default.css')}}">
        <link rel="stylesheet" href="{{asset('css/layout.css')}}">
        <link rel="stylesheet" href="{{asset('css/media-queries.css')}}">
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    
        <link rel="manifest" href="{{asset('manifest.json')}}">
         <script src="{{asset('js/modernizr.js')}}"></script>
    </head>
    
    <body id="app">
        
    </body>

    <script src="{{asset('js/app.js')}}"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{asset('js/jquery-1.10.2.min.js')}}"></script> </script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{asset('js/jquery.flexslider.js')}}"></script>
    <script src="{{asset('js/waypoints.js')}}"></script>
    <script src="{{asset('js/jquery.fittext.js')}}"></script>
    <script src="{{asset('js/magnific-popup.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>

    <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
</html>


