<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <title>Ecommerce App</title>
    </head>
    <body>
        
        <div>
            @include('layouts.navbar')
            <div class="mt-5">
                @yield('content')
            </div>
        </div>
        
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        @yield('javascript')
  </body>
</html>