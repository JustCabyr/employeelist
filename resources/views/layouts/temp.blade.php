<!DOCTYPE html>
<html lang="en" dir="itr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee List</title>
        <link rel="stylesheet" href="/css/app.css">
        <style>
            footer {
            text-align: center;
            }
        </style>
    </head>
    <body>
        @include('inc.navbar')
        @include('inc.messages')
        <div class="container">
            @yield('content')
        </div>
    </body>

    <footer style=text-align:centre>Copyright 2020</footer>

</html>