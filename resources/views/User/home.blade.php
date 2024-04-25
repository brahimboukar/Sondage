<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (Route::has('login'))
    @auth
    @else
     <a href="{{ route('login') }}" class="font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
     @if (Route::has('register'))
     <a href="{{ route('register') }}" class="ml-4 font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
     @endif
     @endauth
     @endif
    <h1>Users</h1>
</body>
</html>