<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    {{-- mycss --}}
    <link rel="stylesheet" href="/../css/login.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div id="test1" class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div id="test" class="row w-full w-75 mt-6 px-6 py-4 bg-white shadow-md sm:rounded-lg">
            <div id="test2" class="col-6 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <div class="col-6 flex flex-col sm:justify-center items-center">
                {{ $slot }}
            </div>

        </div>
    </div>
</body>
<style>
    #test1 {
        height: 100vh;
    }

    #test {
        height: 80vh;
        overflow: scroll;
    }
</style>

</html>
