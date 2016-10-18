<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>

    @include('layouts.partials.nav')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".dropdown-toggle").dropdown();
        });

        $('.comments__create-form').on('keydown', function(e){
            if( e.keyCode == 13){
                e.preventDefault();
                this.submit();
            }
        })
    </script>
</body>
</html>