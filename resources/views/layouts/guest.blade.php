<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="css/tailwindcss2.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

    <style>
        .gradient {
            background: linear-gradient(100deg, #FF9E5E 10%, rgb(69, 67, 67) 100%);
        }

        .gradient2 {
            background: linear-gradient(80deg, #fd8b3f 20%, rgb(47, 46, 46) 100%);
        }

        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('/images/find2.gif') 50% 50% no-repeat rgb(249, 249, 249);
        }
    </style>

    <!-- Styles -->
    @livewireStyles
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="font-sans antialiased text-gray-900 dark:text-gray-100">
        {{ $slot }}
    </div>
</body>

</html>