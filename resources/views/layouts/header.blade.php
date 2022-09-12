<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>NewsTime</title>
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/bootstrap.min.css') }}"
        />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">NewsTime</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"
                            >Главная</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Новости</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')

        <footer class="footer">

        </footer>
        <!-- Scripts -->
        <script
            src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"
            defer
        ></script>
        <script
            src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"
            defer
        ></script>
        <script
            src="{{ asset('assets/js/script.js') }}"
            defer
        ></script>
    </body>
</html>
