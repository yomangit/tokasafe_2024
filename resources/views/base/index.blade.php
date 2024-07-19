<!DOCTYPE html>
<html lang="en" data-theme="nord">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastify/css/toastify.css') }}">
    @stack('styles')
    @if (isset($title))
        <title>{{ $title }}</title>
    @endif
</head>

<body class="static antialiased">

    <div class="min-h-full">

        @include('navigation.navbar')

        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <main>
                    <div class="px-4 py-6 mx-auto  sm:px-6 lg:px-8 ">

                        @yield('content')

                    </div>
                </main>

            </div>
            @include('navigation.sidebar')
        </div>

    </div>

    {{-- Skrips --}}
    <script type="text/javascript" src="{{ asset('toastify/js/toastify.js') }}"></script>
    @stack('scripts')
</body>

</html>
