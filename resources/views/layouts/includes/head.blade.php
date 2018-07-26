<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
        ]) !!};
    </script>


    <style media="screen">
        /*body { padding-bottom: 100px; }*/
        /*.footer {*/
            /*position: absolute;*/
            /*bottom: 0;*/
            /*width: 100%;*/
            /*height: 60px; !* Set the fixed height of the footer here *!*/
            /*line-height: 60px; !* Vertically center the text there *!*/
            /*background-color: #f5f5f5;*/
        /*}*/
        /*.level { display: flex; align-items: center; }*/
        /*.flex { flex: 1; }*/
        /*.mr-1 { margin-right: 1em; }*/
        /*.ml-a { margin-left: auto; }*/
        /*[v-cloak] { display: none; }*/
        /*.ais-highlight > em { background: yellow; font-style: normal; }*/
    </style>

    @yield('head')
</head>