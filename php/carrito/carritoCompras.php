<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <section>
        <?php
        if(isset($_SESSION['carrito'])){
            $datos = $_SESSION['carrito'];
            $total = 0;
            for($i=0;$i(count($datos));$i++){

                ?>
                    <div class="productos">
                        <center>
                            <span><?php echo $datos[$i]['Codigo'] ?></span>
                            <span><?php echo $datos[$i]['Nombre'] ?></span>
                            <span><?php echo $datos[$i]['Precio'] ?></span>
                            
                        </center>

                    </div>
                <?php
                $total = ($datos[$i]['Precio'])+$total;

            }

        }
        else{
            echo '<center><h2>El carrito vacio</h2></center>';
        }
            echo '<center><h2>Total: '.$total.'</h2></center>';
        ?>
        <center><a href="../../index.html" class="btn btn-info btn-sm home"><span class="glyphicon glyphicon-home"> Atras</a></center>

    </section>
    
</body>
</html>