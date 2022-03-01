<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coffee Cafe | Kasir |</title>
        <link rel="icon" href="/assets/stile/img/logo.png">

        {{-- Link CSS --}}
        <link rel="stylesheet" href="/assets/css/kasir.css">
        <link rel="stylesheet" href="/assets/css/style.css">

        {{-- Link Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        {{-- Link Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    </head>

    <body>
        {{-- Loading --}}
        <div id="anim-load">
            <div id="loading"></div>
        </div>

        @include('Kasir/kasirComponent/sidebar') <!-- Sidebar Component -->

        <div id="main">
            @include('Components/header') <!-- Header Component -->

            @yield('content') <!-- Content Kasir -->
        </div>

        <div id="main-footer">
            @include('Components/footer') <!-- Footer Component -->
        </div>

        {{-- Link JS --}}
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="/assets/js/all.js"></script>

        {{-- Loading --}}
        <script>
            var loading = document.getElementById('anim-load');

            window.addEventListener('load', function(){
                loading.style.display="none"
            });
        </script>
    </body>
</html>
