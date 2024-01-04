<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>@yield('title') | PDDikti</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="flex flex-col justify-between bg-slate-100">
    <nav>
        <hr>
        @yield('nav')
        <hr>
    </nav>
    <main class="flex justify-center">
        @yield('content')
        @yield('table')
    </main>
    <footer class="w-full flex items-center justify-center p-6 bg-sky-200 border border-slate-500">
        <div class="max-w-7xl w-full flex justify-center font-medium text-lg">
            <div class="w-1/2 flex flex-col">
                <span>PDDikti App</span>
                <span>&copy; Distributed Database 2023</span>
            </div>
            <div class="flex flex-col">
                <span>220116919 - Ignatius Odi</span>
                <span>220116921 - John Louis Airlangga</span>
                <span>220116928 - Samuel Gunawan</span>
            </div>
        </div>
    </footer>
</body>

</html>
