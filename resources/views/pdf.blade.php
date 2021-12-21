<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oooh+Baby&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300&display=swap"
        rel="stylesheet">
    <title>Reporte de mantenimientos</title>
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        
        }

        .container {
            flex: 1 0 auto;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
                rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            padding: 4rem;
            min-height: 100vh;
            padding: 0px;
            margin: 0px;
        }

        .table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table td,
        .table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #ddd;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .page-break {
            page-break-after: always;
        }


        td h4 {}

    </style>
</head>

<body>
    <div class="container">
        @foreach ($mantenimientos as $value)
            <div style="display: table; width: 100%; margin-bottom:50px;">
                <tr>
                    <td width="70%">
                        <h4>Reporte cotización de mantenimiento - BIOA2</h4>
                    </td>
                    <td width="15%"><img height="30rem" src="../public/images/comuneros.jpeg" alt=""></td>
                    <td width="15%"><img height="30rem" src="../public/images/g_barco.jpeg" alt=""></td>
                </tr>

            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td align="right"><label>Equipo</label></td>
                        <td align="left"><label>{{ ucfirst(mb_strtolower($value->nombre_equipo)) }}</label></td>

                        <td align="right"><label>Año<label></td>
                        <td align="left"><label>{{ $value->anio_cotizacion }}</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Empresa<label></td>
                        <td align="left"><label>{{ ucfirst(mb_strtolower($value->empresa)) }}</label></td>

                        <td align="right">Tipo mantenimiento</td>
                        <td align="left">{{ $value->tipo_mantenimiento }}</td>
                    </tr>
                    <tr>
                        <td align="right"><label>Costo Herramientas</label></td>
                        <td align="left"><label>${{ $value->valor_herramienta }}</label></td>

                        <td align="right"><label>Costo consumibles</label></td>
                        <td align="left"><label>${{ $value->valor_consumibles }}</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Costo repuestos</label></td>
                        <td align="left"><label>${{ $value->valor_repuestos }}</label></td>

                        <td align="right"><label>Encargado</label></td>
                        <td align="left"><label>{{ ucfirst(mb_strtolower($value->perfil)) }}</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Tiempo mantenimiento</label></td>
                        <td align="left"><label>{{ $value->tiempo_mantenimiento }} horas</label></td>

                        <td align="right"><label>Valor mano obra</label></td>
                        <td align="left"><label>${{ $value->valor_mano_ipc }}</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Total</label></td>
                        <td align="left"><label>${{ $value->valor_total }}</label></td>
                    </tr>
                </tbody>
            </table>
            <div class="page-break"></div>
        @endforeach
    </div>
</body>

</html>
