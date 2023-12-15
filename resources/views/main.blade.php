<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>

<body>
    <nav>
        <hr>
        @yield('nav')
        <hr>
    </nav>
    <main>
        @yield('content')
        @yield('table')
    </main>
    <footer>
        <hr>
        <div>&copy; Distributed Database 2023</div>
        <div>220116919 - Ignatius Odi</div>
        <div>220116921 - John Louis Airlangga</div>
        <div>220116928 - Samuel Gunawan</div>
        <hr>
    </footer>
</body>

</html>
