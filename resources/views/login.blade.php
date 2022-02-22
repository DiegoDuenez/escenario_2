<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@</title>
</head>
<body>

    @include('partials.nav')
    @if(session('status'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="container d-flex  justify-content-center flex-column align-items-center mt-5 gap-1">
        <h2>Iniciar sesión</h2>

        <form method="post">
            @csrf
            <div class="mb-3 mt-3 d-flex flex-column">
                <label for="email" class="form-label">Correo eléctronico</label>
                <input class="form-control" type="email" id="email" required autofocus placeholder="Correo eléctronico" name="email" value="{{ old('email')}}">
            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="password" class="form-label">Password:</label>
                <input  class="form-control" id="password" type="password" required placeholder="Contraseña" name="password">
            </div>
            <div class="d-grid gap-2">
                <input  class="btn btn-primary"  type="submit" value="Iniciar sesión">
            </div>
        </form>
        @if ($errors->any())
            <div>{{"Credenciales incorrectas"}}</div>
        @endif




        <!--<form action="" method="post" class="container-sm">
            @csrf
            <div class="d-grid gap-2">
                <label for="">
                    <input type="email" required autofocus placeholder="Correo eléctronico" name="email" value="{{ old('email')}}">
                </label> 
            </div>
            <br>
            <div class="d-grid gap-2">
                <label for="">
                <input type="password" required placeholder="Contraseña" name="password">
                </label> 
            </div>
            <br>
            <div class="d-grid gap-2">
                <input  class="btn btn-primary"  type="submit" value="Inciar sesión">
            </div>
        </form>-->

     

    </div>

    

    

    
</body>
</html>