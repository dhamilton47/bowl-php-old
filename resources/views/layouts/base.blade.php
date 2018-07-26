<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include ('layouts.includes.head')

<body>
    <div id="app">
        @include ('layouts.includes.nav')

        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>

        <flash message="{{ session('flash') }}"></flash>
    </div>

    @include ('layouts.includes.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
