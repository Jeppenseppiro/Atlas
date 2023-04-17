<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="{{ asset('css/Control.FullScreen.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/leaflet-beautify-marker-icon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.mobile.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Control.Coordinates.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/L.Icon.Pulse.css') }}" />

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="{{ asset('js/Control.FullScreen.js') }}"></script>
    <script src="{{ asset('js/leaflet-beautify-marker-icon.js') }}"></script>
    <script src="{{ asset('js/leaflet-color-markers.js') }}"></script>
    <script src="{{ asset('js/leaflet-search.js') }}"></script>
    <script src="{{ asset('js/leaflet-search-geocoder.js') }}"></script>
    <script src="{{ asset('js/Control.Coordinates.js') }}"></script>
    <script src="{{ asset('js/L.Icon.Pulse.js') }}"></script>

    <script src="https://kit.fontawesome.com/c7ac9c9cd1.js" crossorigin="anonymous"></script>
    @inertiaHead
</head>

<body>
    @inertia
</body>

</html>