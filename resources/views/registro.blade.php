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
        <div class="alert alert-succes alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container d-flex  justify-content-center flex-column align-items-center gap-1">
        <h2>Registrarse</h2>

        <form method="post">
            @csrf
            <div class="mb-3 mt-3 d-flex flex-column">
                <label for="email" class="form-label">Correo eléctronico</label>
                <input class="form-control" type="email" id="email" required autofocus placeholder="Correo eléctronico" name="email" value="{{ old('email')}}">
            </div>
            @error('email')<span class="text-danger">{{$message}}</span>@enderror

            <div class="mb-3 mt-3 d-flex flex-column">
                <label for="name" class="form-label">Nombre</label>
                <input class="form-control" type="text" id="name" required autofocus placeholder="Nombre" name="name" value="{{ old('name')}}">
            </div>
            @error('name')<span class="text-danger">{{$message}}</span>@enderror
            <div class="mb-3 mt-3 d-flex flex-column">
                <label for="phone" class="form-label">Número celular</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">+52</span>
                    <input class="form-control" type="number" id="phone" required autofocus placeholder="Número celular" name="phone" value="{{ old('phone')}}" aria-label="password" aria-describedby="basic-addon1">
                </div>
            </div>
            @error('phone')<span class="text-danger">{{$message}}</span>@enderror
            <div class="mb-3 d-flex flex-column">
                <label for="password" class="form-label">Contraseña:</label>
                <input  class="form-control" id="password" type="password" required placeholder="Contraseña" name="password">
            </div>
            @error('password')<span class="text-danger">{{$message}}</span>@enderror
            <div class="d-grid gap-2">
                <input  class="btn btn-primary"  type="submit" value="Registrarme">
            </div>
        </form>
        <!--@if ($errors->any())
            <div>{{"Credenciales incorrectas"}}</div>
        @endif-->
    </div>






    <!--
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
    </form>-->





</body>
</html>