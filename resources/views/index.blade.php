<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIOA2</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="container">

        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Usuario</label>
                    <select id="inputState" class="form-control">
                        <option selected>Seleccione...</option>
                        <option>Ingeniero</option>
                        <option>Técnico</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Tipo de mantenimiento</label>
                    <select id="inputState" class="form-control">
                        <option selected>Seleccione...</option>
                        <option>Preventivo</option>
                        <option>Correctivo</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Año</label>
                    <select id="inputState" class="form-control">
                        <option selected>Seleccione...</option>
                        <option>2019</option>
                        <option>2018</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">IPC</label>
                    <input disabled type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Nombre del equipo</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Serial</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
               
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>
