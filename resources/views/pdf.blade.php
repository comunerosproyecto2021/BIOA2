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

    </style>
</head>

<body>
    <div class="container">
        <?php 
            $total_preventivo_herramientas_2016=0; 
            $total_preventivo_consumibles_2016=0;  
            $total_preventivo_repuestos_2016=0;  
            $total_preventivo_valor_mano_2016=0;
            $total_preventivo_tiempo_2016=0;
            $total_preventivo_2016=0;  
            
            $total_correctivo_herramientas_2016=0; 
            $total_correctivo_consumibles_2016=0;  
            $total_correctivo_repuestos_2016=0;  
            $total_correctivo_valor_mano_2016=0;
            $total_correctivo_tiempo_2016=0;
            $total_correctivo_2016=0;

            $total_preventivo_herramientas_2017=0; 
            $total_preventivo_consumibles_2017=0;  
            $total_preventivo_repuestos_2017=0;  
            $total_preventivo_valor_mano_2017=0;
            $total_preventivo_tiempo_2017=0;
            $total_preventivo_2017=0;  
            
            $total_correctivo_herramientas_2017=0; 
            $total_correctivo_consumibles_2017=0;  
            $total_correctivo_repuestos_2017=0;  
            $total_correctivo_valor_mano_2017=0;
            $total_correctivo_tiempo_2017=0;
            $total_correctivo_2017=0;

            $total_preventivo_herramientas_2018=0; 
            $total_preventivo_consumibles_2018=0;  
            $total_preventivo_repuestos_2018=0;  
            $total_preventivo_valor_mano_2018=0;
            $total_preventivo_tiempo_2018=0;
            $total_preventivo_2018=0;  
            
            $total_correctivo_herramientas_2018=0; 
            $total_correctivo_consumibles_2018=0;  
            $total_correctivo_repuestos_2018=0;  
            $total_correctivo_valor_mano_2018=0;
            $total_correctivo_tiempo_2018=0;
            $total_correctivo_2018=0;

            $total_preventivo_herramientas_2019=0; 
            $total_preventivo_consumibles_2019=0;  
            $total_preventivo_repuestos_2019=0;  
            $total_preventivo_valor_mano_2019=0;
            $total_preventivo_tiempo_2019=0;
            $total_preventivo_2019=0;  
            
            $total_correctivo_herramientas_2019=0; 
            $total_correctivo_consumibles_2019=0;  
            $total_correctivo_repuestos_2019=0;  
            $total_correctivo_valor_mano_2019=0;
            $total_correctivo_tiempo_2019=0;
            $total_correctivo_2019=0;
        ?>
        @foreach ($mantenimientos as $value)

            <?php 
                if($value->id_tipo_mantenimiento == 1 && $value->anio_cotizacion == 2016){
                    $total_preventivo_herramientas_2016 += $value->valor_herramienta;
                    $total_preventivo_consumibles_2016 +=  $value->valor_consumibles;
                    $total_preventivo_repuestos_2016 +=  $value->valor_repuestos;
                    $total_preventivo_valor_mano_2016 += $value->valor_mano_ipc;
                    $total_preventivo_tiempo_2016 += $value->tiempo_mantenimiento;
                    $total_preventivo_2016 += $value->valor_total;
                }

                if($value->id_tipo_mantenimiento == 2 && $value->anio_cotizacion == 2016){
                    $total_correctivo_herramientas_2016 += $value->valor_herramienta;
                    $total_correctivo_consumibles_2016 +=  $value->valor_consumibles;
                    $total_correctivo_repuestos_2016 +=  $value->valor_repuestos;
                    $total_correctivo_valor_mano_2016 += $value->valor_mano_ipc;
                    $total_correctivo_tiempo_2016 += $value->tiempo_mantenimiento;
                    $total_correctivo_2016 += $value->valor_total;
                }

                if($value->id_tipo_mantenimiento == 1 && $value->anio_cotizacion == 2017){
                    $total_preventivo_herramientas_2017 += $value->valor_herramienta;
                    $total_preventivo_consumibles_2017 +=  $value->valor_consumibles;
                    $total_preventivo_repuestos_2017 +=  $value->valor_repuestos;
                    $total_preventivo_valor_mano_2017 += $value->valor_mano_ipc;
                    $total_preventivo_tiempo_2017 += $value->tiempo_mantenimiento;
                    $total_preventivo_2017 += $value->valor_total;
                }

                if($value->id_tipo_mantenimiento == 2 && $value->anio_cotizacion == 2017){
                    $total_correctivo_herramientas_2017 += $value->valor_herramienta;
                    $total_correctivo_consumibles_2017 +=  $value->valor_consumibles;
                    $total_correctivo_repuestos_2017 +=  $value->valor_repuestos;
                    $total_correctivo_valor_mano_2017 += $value->valor_mano_ipc;
                    $total_correctivo_tiempo_2017 += $value->tiempo_mantenimiento;
                    $total_correctivo_2017 += $value->valor_total;
                }

                if($value->id_tipo_mantenimiento == 1 && $value->anio_cotizacion == 2018){
                    $total_preventivo_herramientas_2018 += $value->valor_herramienta;
                    $total_preventivo_consumibles_2018 +=  $value->valor_consumibles;
                    $total_preventivo_repuestos_2018 +=  $value->valor_repuestos;
                    $total_preventivo_valor_mano_2018 += $value->valor_mano_ipc;
                    $total_preventivo_tiempo_2018 += $value->tiempo_mantenimiento;
                    $total_preventivo_2018 += $value->valor_total;
                }

                if($value->id_tipo_mantenimiento == 2 && $value->anio_cotizacion == 2018){
                    $total_correctivo_herramientas_2018 += $value->valor_herramienta;
                    $total_correctivo_consumibles_2018 +=  $value->valor_consumibles;
                    $total_correctivo_repuestos_2018 +=  $value->valor_repuestos;
                    $total_correctivo_valor_mano_2018 += $value->valor_mano_ipc;
                    $total_correctivo_tiempo_2018 += $value->tiempo_mantenimiento;
                    $total_correctivo_2018 += $value->valor_total;
                }


                if($value->id_tipo_mantenimiento == 1 && $value->anio_cotizacion == 2019){
                    $total_preventivo_herramientas_2019 += $value->valor_herramienta;
                    $total_preventivo_consumibles_2019 +=  $value->valor_consumibles;
                    $total_preventivo_repuestos_2019 +=  $value->valor_repuestos;
                    $total_preventivo_valor_mano_2019 += $value->valor_mano_ipc;
                    $total_preventivo_tiempo_2019 += $value->tiempo_mantenimiento;
                    $total_preventivo_2019 += $value->valor_total;
                }

                if($value->id_tipo_mantenimiento == 2 && $value->anio_cotizacion == 2019){
                    $total_correctivo_herramientas_2019 += $value->valor_herramienta;
                    $total_correctivo_consumibles_2019 +=  $value->valor_consumibles;
                    $total_correctivo_repuestos_2019 +=  $value->valor_repuestos;
                    $total_correctivo_valor_mano_2019 += $value->valor_mano_ipc;
                    $total_correctivo_tiempo_2019 += $value->tiempo_mantenimiento;
                    $total_correctivo_2019 += $value->valor_total;
                }

            ?>
            
            <div style="display: table; width: 100%; margin-bottom:50px;">
                <tr>
                    <td width="70%">
                        <h4>Reporte cotización de mantenimiento - BIOA2</h4>
                    </td>
                    @if(!is_null($value->logo))
                        <td width="30%"><img height="40rem" src="../public/images/{{$value->logo}}" alt=""></td>
                    @endif

                   
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
        
        @if($total_preventivo_herramientas_2016>0)
            <h4>Preventivo - 2016</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td align="right"><label>Total herramientas</label></td>
                        <td align="left"><label>${{ $total_preventivo_herramientas_2016 }}</label></td>

                        <td align="right"><label>Total consumibles</label></td>
                        <td align="left"><label>${{ $total_preventivo_consumibles_2016 }}</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Total repuestos</label></td>
                        <td align="left"><label>${{ $total_preventivo_repuestos_2016 }}</label></td>

                        <td align="right">Total tiempo</td>
                        <td align="left">{{ $total_preventivo_tiempo_2016 }} horas</td>
                    </tr>
                    <tr>
                        <td align="right"><label>Total mano de obra</label></td>
                        <td align="left"><label>${{ $total_preventivo_valor_mano_2016 }}</label></td>

                        <td align="right"><label>Total</label></td>
                        <td align="left"><label>${{ $total_preventivo_2016 }}</label></td>
                    </tr>
                    
                </tbody>
            </table>
        @endif
        @if($total_correctivo_herramientas_2016>0)
            <h4>Correctivo - 2016</h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td align="right"><label>Total herramientas</label></td>
                        <td align="left"><label>${{ $total_correctivo_herramientas_2016 }}</label></td>

                        <td align="right"><label>Total consumibles</label></td>
                        <td align="left"><label>${{ $total_correctivo_consumibles_2016 }}</label></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Total repuestos</label></td>
                        <td align="left"><label>${{ $total_correctivo_repuestos_2016 }}</label></td>

                        <td align="right">Total tiempo</td>
                        <td align="left">{{ $total_correctivo_tiempo_2016 }} horas</td>
                    </tr>
                    <tr>
                        <td align="right"><label>Total mano de obra</label></td>
                        <td align="left"><label>${{ $total_correctivo_valor_mano_2016 }}</label></td>

                        <td align="right"><label>Total</label></td>
                        <td align="left"><label>${{ $total_correctivo_2016 }}</label></td>
                    </tr>
                    
                </tbody>
            </table>
        @endif

        @if($total_preventivo_herramientas_2017>0)
        <h4>Preventivo - 2017</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td align="right"><label>Total herramientas</label></td>
                    <td align="left"><label>${{ $total_preventivo_herramientas_2017 }}</label></td>

                    <td align="right"><label>Total consumibles</label></td>
                    <td align="left"><label>${{ $total_preventivo_consumibles_2017 }}</label></td>
                </tr>
                <tr>
                    <td align="right"><label>Total repuestos</label></td>
                    <td align="left"><label>${{ $total_preventivo_repuestos_2017 }}</label></td>

                    <td align="right">Total tiempo</td>
                    <td align="left">{{ $total_preventivo_tiempo_2017 }} horas</td>
                </tr>
                <tr>
                    <td align="right"><label>Total mano de obra</label></td>
                    <td align="left"><label>${{ $total_preventivo_valor_mano_2017 }}</label></td>

                    <td align="right"><label>Total</label></td>
                    <td align="left"><label>${{ $total_preventivo_2017 }}</label></td>
                </tr>
                
            </tbody>
        </table>
    @endif
    @if($total_correctivo_herramientas_2017>0)
        <h4>Correctivo - 2017</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td align="right"><label>Total herramientas</label></td>
                    <td align="left"><label>${{ $total_correctivo_herramientas_2017 }}</label></td>

                    <td align="right"><label>Total consumibles</label></td>
                    <td align="left"><label>${{ $total_correctivo_consumibles_2017 }}</label></td>
                </tr>
                <tr>
                    <td align="right"><label>Total repuestos</label></td>
                    <td align="left"><label>${{ $total_correctivo_repuestos_2017 }}</label></td>

                    <td align="right">Total tiempo</td>
                    <td align="left">{{ $total_correctivo_tiempo_2017 }} horas</td>
                </tr>
                <tr>
                    <td align="right"><label>Total mano de obra</label></td>
                    <td align="left"><label>${{ $total_correctivo_valor_mano_2017 }}</label></td>

                    <td align="right"><label>Total</label></td>
                    <td align="left"><label>${{ $total_correctivo_2017 }}</label></td>
                </tr>
                
            </tbody>
        </table>
    @endif

    @if($total_preventivo_herramientas_2018>0)
        <h4>Preventivo - 2018</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td align="right"><label>Total herramientas</label></td>
                    <td align="left"><label>${{ $total_preventivo_herramientas_2018 }}</label></td>

                    <td align="right"><label>Total consumibles</label></td>
                    <td align="left"><label>${{ $total_preventivo_consumibles_2018 }}</label></td>
                </tr>
                <tr>
                    <td align="right"><label>Total repuestos</label></td>
                    <td align="left"><label>${{ $total_preventivo_repuestos_2018 }}</label></td>

                    <td align="right">Total tiempo</td>
                    <td align="left">{{ $total_preventivo_tiempo_2018 }} horas</td>
                </tr>
                <tr>
                    <td align="right"><label>Total mano de obra</label></td>
                    <td align="left"><label>${{ $total_preventivo_valor_mano_2018 }}</label></td>

                    <td align="right"><label>Total</label></td>
                    <td align="left"><label>${{ $total_preventivo_2018 }}</label></td>
                </tr>
                
            </tbody>
        </table>
    @endif
    @if($total_correctivo_herramientas_2018>0)
        <h4>Correctivo - 2018</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td align="right"><label>Total herramientas</label></td>
                    <td align="left"><label>${{ $total_correctivo_herramientas_2018 }}</label></td>

                    <td align="right"><label>Total consumibles</label></td>
                    <td align="left"><label>${{ $total_correctivo_consumibles_2018 }}</label></td>
                </tr>
                <tr>
                    <td align="right"><label>Total repuestos</label></td>
                    <td align="left"><label>${{ $total_correctivo_repuestos_2018 }}</label></td>

                    <td align="right">Total tiempo</td>
                    <td align="left">{{ $total_correctivo_tiempo_2018 }} horas</td>
                </tr>
                <tr>
                    <td align="right"><label>Total mano de obra</label></td>
                    <td align="left"><label>${{ $total_correctivo_valor_mano_2018 }}</label></td>

                    <td align="right"><label>Total</label></td>
                    <td align="left"><label>${{ $total_correctivo_2018 }}</label></td>
                </tr>
                
            </tbody>
        </table>
    @endif

    @if($total_preventivo_herramientas_2019>0)
        <h4>Preventivo - 2019</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td align="right"><label>Total herramientas</label></td>
                    <td align="left"><label>${{ $total_preventivo_herramientas_2019 }}</label></td>

                    <td align="right"><label>Total consumibles</label></td>
                    <td align="left"><label>${{ $total_preventivo_consumibles_2019 }}</label></td>
                </tr>
                <tr>
                    <td align="right"><label>Total repuestos</label></td>
                    <td align="left"><label>${{ $total_preventivo_repuestos_2019 }}</label></td>

                    <td align="right">Total tiempo</td>
                    <td align="left">{{ $total_preventivo_tiempo_2019 }} horas</td>
                </tr>
                <tr>
                    <td align="right"><label>Total mano de obra</label></td>
                    <td align="left"><label>${{ $total_preventivo_valor_mano_2019 }}</label></td>

                    <td align="right"><label>Total</label></td>
                    <td align="left"><label>${{ $total_preventivo_2019 }}</label></td>
                </tr>
                
            </tbody>
        </table>
    @endif
    @if($total_correctivo_herramientas_2019>0)
        <h4>Correctivo - 2019</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td align="right"><label>Total herramientas</label></td>
                    <td align="left"><label>${{ $total_correctivo_herramientas_2019 }}</label></td>

                    <td align="right"><label>Total consumibles</label></td>
                    <td align="left"><label>${{ $total_correctivo_consumibles_2019 }}</label></td>
                </tr>
                <tr>
                    <td align="right"><label>Total repuestos</label></td>
                    <td align="left"><label>${{ $total_correctivo_repuestos_2019 }}</label></td>

                    <td align="right">Total tiempo</td>
                    <td align="left">{{ $total_correctivo_tiempo_2019 }} horas</td>
                </tr>
                <tr>
                    <td align="right"><label>Total mano de obra</label></td>
                    <td align="left"><label>${{ $total_correctivo_valor_mano_2019 }}</label></td>

                    <td align="right"><label>Total</label></td>
                    <td align="left"><label>${{ $total_correctivo_2019 }}</label></td>
                </tr>
                
            </tbody>
        </table>
    @endif    

    </div>
</body>

</html>
