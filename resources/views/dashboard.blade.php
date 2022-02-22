<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    @include('partials.nav')

    @if(session('status'))
        <br>
        {{session('status')}}
    @endif

    
    <h2>¡DASHBOARD!</h2>
    <p>¡Hola {{auth()->user()->name}}!</p>
 

    
</body>
</html>