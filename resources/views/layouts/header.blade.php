<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/fontawesome-free/css/all.min.css' }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ Config::get('consts.SITE_DOMAIN').'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css' }}">
    <link rel="stylesheet" href="{{ Config::get('consts.SITE_DOMAIN').'assets/dist/css/adminlte.min.css' }}">
    @yield('style')

    @yield('css')
</head>
<body class="@yield('body-class')">