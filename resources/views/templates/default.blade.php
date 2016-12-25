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
        
        

        <div class="container">
         @include('templates.partials.alerts')
            @yield('content')
        </div>

    </body>
</html>