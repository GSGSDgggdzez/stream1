<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if (app()->environment('local'))
            <meta http-equiv="Content-Security-Policy" content="
                default-src * 'unsafe-inline' 'unsafe-eval';
                script-src * 'unsafe-inline' 'unsafe-eval';
                style-src * 'unsafe-inline';
                img-src * data: blob: 'unsafe-inline';
                font-src * data: blob: 'unsafe-inline';
                connect-src * 'unsafe-inline';
                frame-src *;
            ">
        @endif

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script>
            window.Stripe_API_KeyP = "{{ env('Stripe_API_KeyP') }}";
        </script>
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.tsx', "resources/js/Pages/{$page['component']}.tsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>

