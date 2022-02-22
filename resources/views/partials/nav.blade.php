
<!--<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="/login">Escenario 2</a>
    @auth
        <a href="/dashboard">Dashboard</a>
        <form style="display: inline;" action="/logout" method="POST">
            @csrf
            <a style="cursor:pointer;" type="submit" onclick="this.closest('form').submit()">Logout</a>
        </form>
    @else
        <a href="/">Login</a>
        <a href="/registro">Registro</a>
    @endauth
  </div>
</nav>-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    @auth
        <a class="navbar-brand fw-bold" href="/dashboard">Escenario 2</a>
    @else
        <a class="navbar-brand fw-bold" href="/">Escenario 2</a>
    @endauth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        <li class="nav-item">
            <a href="/dashboard"  class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
            <form style="display: inline;" action="/logout" method="POST">
                @csrf
                <a class="nav-link" style="cursor:pointer;" type="submit" onclick="this.closest('form').submit()">Logout</a>
            </form>
        </li>
         @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Iniciar Sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/registro">Registrarse</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>