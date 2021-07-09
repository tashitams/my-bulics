<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="theme-color" content="#3367D6">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('img/icon/favicon.ico') }}" />
    <link rel="apple-touch-icon" href="{{ asset('img/icon/android-chrome-192x192.png') }}">
    <link href="{{ asset('site.webmanifest') }}" rel="manifest" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @routes
</head>

<body class="antialiased font-sans bg-white select-none">
    <noscript>
        Sorry please enable javascript
    </noscript>
    @inertia
    <script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                // Registration was successful
                console.log('Service worker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('Service worker registration failed: ', err);
            });
        });
    }

    </script>
</body>

</html>
