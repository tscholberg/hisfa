<!DOCTYPE html>
<html>
<head>
    @yield('page-title')
    @include('layouts.basic-style')
</head>
<body>
    @yield('app-content')
    @extends('layouts.end-body-scripts')
</body>
</html>