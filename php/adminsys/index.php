<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Proyecto De Farmacias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
  <link rel="shortcut icon" href="../../img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
  <!--<link rel="stylesheet" type="text/css" href="css/estilo.css">--> 
</head>
<body>
   

    <div class="container-fluid">
            <div class="jumbotron">
                <?php 
                    switch ($_SESSION['rol']) {
                        case 1:
                        default:
                        //echo "<script language='javascript'>window.location='../../index.html';</script>";
                        if (!isset($_SESSION['rol']))
                            header("location:../../index.html");
                //ejemplos: https://es.switch-case.com/55085356
                        //http://decsai.ugr.es/~jfv/ed1/c/cdrom/cap4/cap42.htm#v_ej_b
                        //http://hacerpaginaswebconphp.com/control-de-sesiones-en-php/

                ?>            
                <h1>Menú Administrador</h1>
                <?php 
                        break;
                        case 3:
                ?>
                <h1>Menú Estudiantes</h1>
                <?php 
                        break;
                }?>
            </div>
        <div class="panel-group"><div class="panel panel-default">
            <!--<div class="panel-heading">Gestion</div>-->
            <div class="panel-body">
                
                <div class="form-group" id="opciones"><div class="row">

                        <div class="col-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Menu
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?php 
                                            switch ($_SESSION['rol']) {
                                                case 1:
                                        ?>
                                        <a class="list-group-item" href="../../php/farmacia/index.php" id="farmacias">Gestion Farmacias</a>
                                        <a class="list-group-item" href="../../php/cliente/index.php" id="clientes">Gestion Clientes</a>
                                        <a class="list-group-item" href="../../php/genero/index.php" id="generos">Gestion Generos</a>
                                        <a class="list-group-item" href="../../php/documento/index.php" id="documentos">Gestion Documentos</a>
                                        <!--<a class="list-group-item" href="#php/asignaturas/index.php" id="asignaturas">Gestion Asignaturas</a>-->
                                        <!--<a class="list-group-item" href="#php/instituciones/index.php" id="instituciones">Gestion Instituciones</a>-->
                                        <a class="list-group-item" href="../ciudad/index.php" id="ciudades">Gestion Ciudades</a>
                                        <a class="list-group-item" href="../../php/pais/index.php" id="paises">Gestion Paises</a>
                                        <a class="list-group-item" href="../../php/producto/index.php" id="producto">Gestion Producto</a>
                                        <!--<a class = "reporte" href="../../recursos/reporte/exPDF.php" target="_blank" role="button">Reporte</a>--><!--Prueba de link -->
                                        <?php
                                                break;
                                                case 3:
                                        ?>
                                        <a class="list-group-item" href="php/estudiantes/index.php" id="estudiantes">Consulta</a>
                                        <?php

                                                break;
                                                case 2:
                                            
                                        }?>
                                    </div>
                                    <div class="list-group">
                                        <a class="list-group-item active" href="../logout.php">Cerrar sesión</a>
                                    </div>
                                </div>
                           <!--  <p><a id="empresas" class="btn btn-danger btn-block" href="php/empresa/index.php" role="button">Empresas</a></p>
                            <p><a id="contrato" class="btn btn-danger btn-block" href="php/contrato/index.php" role="button">Contrato</a></p> -->
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="panel-group hide" id="contenedor">
                            <div class="panel panel-default">
                                <div class="panel-heading" id="titulo"></div>
                                <div class="panel-body">
                                    <div class="form-group" id="contenido">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <!-- Funciones de Lógica de negocio -->
    <script src="../../js/funcionesJquery.js"></script>
    <script>
        $(document).ready(Inicio);
    </script>
    
</body>
</html>