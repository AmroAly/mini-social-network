<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Social</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        @include('templates.partials.nav')
        
        @include('templates.partials.alerts')

        <div class="container">
            @yield('content')
        </div>

    </body>
</html>