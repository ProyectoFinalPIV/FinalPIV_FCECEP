<?php
session_start();
if(isset($_SESSION['user'])){
$user = $_SESSION['user'];
} else {
    header("location:../../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gestion de Farmacias</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../../img/favicon.png">
  <link rel="stylesheet" type="text/css" media="screen" href="../../css/estilo.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="../../bootstrap/css/styles.css" />
  
</head>
<body>
    <!--<div class="bs-example">
        <div class="jumbotron">
            <h1>Manejo de Base de Datos</h1>   
        </div>
    </div>-->
   
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="button" href="../../index.html"><img src="../../recursos/img/editar.png"></a>
            </div>  
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="#services">SERVICES</a></li>
                    <li><a href="#portfolio">PORTFOLIO</a></li>
                    <!--<li><a href="#contact">CONTACT</a></li>-->
                    <ul class="nav navbar-nav navbar-right" id="estes">
                        <li><a href="#"><i class="fa fa-user"><?php echo $user; ?></i></a></li>
                        <li><a href="../logout2.php"><i class="fa fa-power-off"></i>CERRAR</a></li>
                        <li><a class="btn btn-info carro" href="#" role="button"><i class="fa fa-shopping-cart"></i></a></li>    
                    </ul>
                </ul>
                
            </div> 
        </div> 
    </nav>
    <div class="container-fluid nopaddingleft nopaddingright" style="background-color: #fcc312;">
        <br>
            <nav class="main_menu">
                    <ul class="nav nav-justified" role="tablist">
                            <li class="dropdown" role="presentation" style="position: inherit; background-color: darkgrey; width: 628.5px;">
                                    <a id="categorias" href="#" class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-list"></i> Categorías</span></a>
                                    <ul class="dropdown-menu category" aria-labelledby="categorias">
                                    <li class="cuidado-personal" data-codigo='1' style="width: 276px;"><a href="#">ALIMENTOS Y BEBIDAS</a></li>
                                            <li class="cuidado-personal" data-codigo='2' style="width: 276px;"><a href="#">ASEO Y HOGAR</a></li>
                                            <li class="cuidado-personal" data-codigo='3' style="width: 276px;"><a href="#">BEBE</a></li>
                                            <li class="cuidado-personal" data-codigo='4' style="width: 276px;"><a href="#">CUIDADO EN CASA</a></li>
                                    </ul>
                            </li>
                            <li class="modulo-menu" style="background-color: rgb(38, 17, 223); width: 628.5px;">
                                <a href="#"><i class="glyphicon glyphicon-usd"></i> Descuentos</a>

                            </li>
                            <li class="modulo-menu" style="background-color: rgb(15, 218, 76); width: 628.5px;">
                                <a href="#"><i class="glyphicon glyphicon-leaf"></i> Naturales</a>
                            </li>    
                    </ul>
            </nav>
        
    </div>

    <div class="container">
       

        <div class="panel-group" id="contenedor"><div class="panel panel-primary"> <!--cambio-->
            <div class="panel-heading" id="titulo"></div>
                <div class="panel-body">
                    <div class="form-group" id="contenido"> 
                            <div class="tabla table-responsive"> <!--cambio-->

                                    <table id="tablas" class="table table-striped table-bordered table-hover" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Stock</th>
                                                <th>Proveedor</th>
                                                <th>Tipo Producto</th>
                                                <th>&nbsp;</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                
                                    </table>
                                
                            </div><!-- /.box-body -->        
                    
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer>
     
            <div class="container-fluid">
            
                <h2 class="text-center">CONTACTO</h2>
                <div class="row">
                <div class="col-sm-4">
                    <p>Póngase en contacto con nosotros.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> Cali, CO</p>
                    <p><span class="glyphicon glyphicon-phone"></span> +57 3172882251</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> maleseiman@gmail.com</p>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Enviar</button>
                    </div>
                    </div>
                </div>
                </div>
            
            </div>
        </footer>
    </div>   
    <input type="hidden" id="pagina" value="index" name="editar"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Librearía para las funcionalidades de la tabla -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <!-- Librería para las alertas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <!-- Funciones de Lógica de negocio-->
    <script src="../../js/funcionesJquery.js"></script>
    
    <script src="../../js/funcionesMostrarProdu.js"></script>
    <!-- Funciones de Lógica de neogcio-->
    <script>
        //$(document).ready(Inicio);
        $(document).ready(login);
       
        
    </script>
   
</body>
</html>