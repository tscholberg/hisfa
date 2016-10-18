<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hisfa</title>

    <!-- Header -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">

</head>
<body>
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    @endif

    <h1>Hisfa project</h1>
</div>
</body>
</html>
