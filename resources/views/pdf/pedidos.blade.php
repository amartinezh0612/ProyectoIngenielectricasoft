<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de </title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
    }


    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background: #33AFFF;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #faproveedor {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }

    #faproveedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproveedor {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproveedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

</style>

<body>
    @foreach ($pedidos as $ped)
    <header>
       
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL PROVEEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">
                                Nombre: {{$ped->proveedor}} <br>
                                Teléfono: {{$ped->telefono}} <br>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div align="text-left" id="logo">
                <img  src={{ asset('images/logo-inverse.png') }} alt="" id="imagen" align="center">
            </div>
        <div>
    </header>
    @endforeach
    <br>

    <br>
    <section>
        <div>
            <table id="facproveedor">
            <thead>
                    <tr id="fa">
                        <th>PROVEEDOR</th>
                        <th>FECHA ELABORACION</th>
                        <th>FECHA INICIO PEDIDO</th>
                        <th>FECHA FINAL PEDIDO</th>
                        <th>TIPO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $ped)
                    <tr>
                        <td>{{$ped->proveedor}}</td>
                        <td>{{$ped->fecha_elaboracion}}</td>
                        <td>{{$ped->fecha_inicio_pedido}}</td>
                        <td>{{$ped->fecha_final_pedido}}</td>
                        <td>{{$ped->tipo_movimiento}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO PRODUCTO</th>
                        <!--<th>CANTIDAD*PRECIO</th>-->
                        <th>SUBTOTAL (USD$)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalle_pedidos as $det)
                    <tr>
                        <td>{{$det->cantidad}}</td>
                        <td>{{$det->producto}}</td>
                        <td>${{$det->costo}}</td>
                        <!--<td>${{$det->cantidad*$det->precio}}</td>-->
                        <td>${{number_format($det->cantidad*$det->costo,2)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                @foreach ($pedidos as $ped)
                        <tr>
                           <th colspan="3"><p align="right">TOTAL:</p></th>
                            <td><p align="right">${{number_format($ped->monto_total)}}<p></td>
                        </tr>
                        <tr>
                           <th  colspan="3"><p align="right">TOTAL PAGAR:</p></th>
                            <td><p align="right">$ {{number_format($ped->monto_total)}}</p></td>
                        </tr>
                        @endforeach
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--puedes poner un mensaje aqui-->
        <div id="datos">
            <p id="encabezado">
                <b>Ingenielectricasoft</b><br><br>Telefono:(+00)123456799<br>Email:ingenielectricasoft@gmail.com
            </p>
        </div>
    </footer>
</body>

</html>
