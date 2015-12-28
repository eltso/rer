<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css')!!}" >
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-material-design.min.css')!!}" >
    <link rel="stylesheet" type="text/css" href="{!! asset('css/ripples.min.css')!!}" >



</head>
<body>

@include('shared.navbar')

@yield('content')

<script src="{!! asset('js/jquery-2.1.4.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>

<script src="{!! asset('js/ripples.min.js') !!}"></script>
<script src="{!! asset('js/material.min.js') !!}"></script>


<script>
    $(document).ready(function() {
// This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>
</html>