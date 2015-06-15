<!doctype html>
<html lang="en" ng-app="larabook">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/main.css">

    <style>
        .flash {
            display: inline-block;
            position: absolute;
            top: 70px;
            right: 10px;
            z-index: 100;
        }
    </style>
</head>
<body>

    @include('layouts.partials.nav')

    <div class="container">
        @include('flash')
        @include('flash::message')

        @yield('content')
    </div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="/js/jquery/jquery.js"></script>
    <script src="/js/handlebars/handlebars.js"></script>
    <script src="/js/pusher/pusher.js"></script>
    <script src="/js/app.js"></script>
    
    <script>
        $('#flash-overlay-modal').modal();

        $('.comments__create-form').on('keydown', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                $(this).submit();
            }
        });
    </script>
</body>
</html>