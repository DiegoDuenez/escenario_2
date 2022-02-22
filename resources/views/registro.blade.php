<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    
    @include('partials.nav')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{session('status')}}
        </div>
    @endif

    <h2>Registro</h2>

    <form action="" method="post">
        @csrf
        <label for="">
            <input class="form-control form-control-lg" type="email" required autofocus placeholder="Correo eléctronico" name="email" value="{{ old('email')}}">
        </label> 
        @error('email') {{$message}} @enderror
        <br>
        <label for="">
            <input type="text" required placeholder="Nombre" name="name" value="{{ old('name')}}">
        </label> 
        @error('name') {{$message}} @enderror
        <br>
        <label for="">
            <input type="number" required placeholder="Número celular" name="phone" value="{{ old('phone')}}">
        </label> 
        @error('phone') {{$message}} @enderror
        <br>
        <label for="">
           <input type="password" required placeholder="Contraseña" name="password">
        </label> 
        @error('password') {{$message}} @enderror
        <br>
        
        <input type="submit" value="Registrate">
    </form>

</body>
</html>