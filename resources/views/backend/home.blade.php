<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- extends css -->
{{--
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
--}}
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet" />
{{--
    <link href="{{asset('css/default.css')}}" rel="stylesheet" />
--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->

    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
        window.Language = "{{ config('app.locale') }}";
        window.User ="{{ Auth::user()}}";

    </script>
</head>
<body>
<div id="app">



</div>
<!-- extends Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('js/apps.min.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>