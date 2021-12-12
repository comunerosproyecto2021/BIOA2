<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema BIOA2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/formulario_registro') }}">Registro usuarios</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ url('/cerrar_sesion') }}">Cerrar sesión</a>
            </li>
        </ul>
        </div>
        
    </div>
</nav>