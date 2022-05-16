<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.0.0/css/sb-admin-2.min.css" rel="stylesheet" media="all">
    
</head>
<body>
    <div id="app">
        @include('components.header')
        <main class="py-4">
            @include('components.message')
            @yield('content')
        </main>
        @include('components.footer')
    </div>
</body>
</html>
