<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/respo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>@yield('title', 'Responsable Dashboard')</title>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            @include('partials.sidebar-respo') <!-- Inclusion de la barre latérale -->
        </aside>
        <main class="content-respo">
            <section id="main-content">
                @yield('content-respo') <!-- Section pour le contenu spécifique -->
            </section>
        </main>
    </div>
</body>
</html>
