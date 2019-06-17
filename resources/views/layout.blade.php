<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EliXr</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('templates/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('templates/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/css/style.css') }}" rel="stylesheet">
    <style>
        .mt40 {
            margin-top: 40px;
        }
    </style>
    @yield('cssmodule')
</head>

<body class="fixed-sidebar">
    <div id="wrapper">
        @include('menu')
        <div id="page-wrapper" class="gray-bg">
            @include('horizontalbar')
            @include('route')
            @yield('content')

            <!-- Mainly scripts -->
            <script src="{{ asset('templates/js/jquery-3.1.1.min.js') }}"></script>
            <script src="{{ asset('templates/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('templates/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
            <script src="{{ asset('templates/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

            <!-- Custom and plugin javascript -->
            <script src="{{ asset('templates/js/inspinia.js') }}"></script>
            <script src="{{ asset('templates/js/plugins/pace/pace.min.js') }}"></script>


            @include('footer')
            @yield('jsmodule')
        </div>
    </div>
</body>

</html>
