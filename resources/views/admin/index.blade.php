<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/img-robot-2.png') }}">
    <meta name="csrf-token" content="CSRF_TOKEN_VALUE">
    <title>Admin - ITASE 6.0</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
</head>
<body>
    <x-partials.section :page="$page" :component="$component" :data="$data" :route="'dashboard.setting'" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
