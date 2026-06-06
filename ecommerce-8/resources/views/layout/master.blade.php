<!-- make landing page-->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>
<body class="d-flex flex-column min-vh-100">

    @include('template.navbar')

    <main class="flex-grow-1">
        <div class="container mt-4 mb-5">
            @yield('content')
        </div>
    </main>

    @include('template.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>