<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administrador de Farmacias</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
   <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
   <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
  <link rel="shortcut icon" href="../../img/favicon.png">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Administrador de farmacias</h1>
        </div>
    </div>
    <div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">Tablas Maestras</div>
                <div class="panel-body">
    
                   <div class="form-group" id="opciones">
                    <!--<div class="form-group col-sm-6"> -->
                    <a class="btn btn-primary col-xs-2" href="../../index.html" role="button">Cerrar</a>       
                    <div class="col-sm-2 col-xs-10 col-md-8 col-sm-offset-2" id="opciones"><!--funcionesJquery.js-->
                        
                        <div class="col-sm-10">
                            <a class="btn btn-primary" href="php/ciudad/index.php" role="button">Ciudades</a>
                            <a class="btn btn-primary" href="php/usuario/index.php" role="button">Países</a>
                            <a class="btn btn-primary" href="php/usuario/index.php" role="button">Farmacias</a>
                            <a class="btn btn-primary" href="php/usuario/index.php" role="button">Clientes</a>

                        </div>
                    </div>
                <!--</div>-->
            </div>

        </div>
    </div>
   </div>
    <div class="panel-group hide" id="contenedora"><!--funcionesJquery.js-->
        <div class="panel panel-primary">
            <div class="panel-heading" id="titulo"></div>
            <div class="panel-body">
               <div class="form-group" id="contenido"><!--funcionesJquery.js-->
               </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="pagina" value="index" name="editar" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Librearía para las funcionalidades de la tabla -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <!-- Librería para las alertas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    
    <!-- Funciones de Lógica de negocio -->
    <script src="js/funcionesJquery.js"></script>
    <!-- Funciones de Lógica de neogcio -->
    <script>
        $(document).ready(Inicio);
    </script>
</body>
</html>