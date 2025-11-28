<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>

    <div class="container py-4">
        @yield('content')
    </div>

</body>
</html>
