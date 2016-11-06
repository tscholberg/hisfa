<!DOCTYPE html>
<html>
<head>
    <title>@yield('page-title')</title>
    @include('layouts.basic-style')
</head>
<body>
    @yield('app-content')
    @include('layouts.end-body-scripts')
</body>
</html>