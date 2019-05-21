<?php
 
require_once 'producto_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $producto = new Producto();
        $resultado = $producto->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $producto = new Producto();
		$resultado = $producto->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
        $producto = new Producto();
		$resultado = $producto->borrar($datos['codigo']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $producto = new Producto();
        $producto->consultar($datos['codigo']);

        if($producto->getProdu_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $producto->getProdu_codi(),
                'nombre' => $producto->getProdu_nomb(),
                'precio' =>$producto->getProdu_precio(),
                'stock' => $producto->getProdu_stock(),
                'proveedor' =>$producto->getProve_codi(),
                'tipo' =>$producto->getTipo_prod_codi(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultarP':
        $producto = new Producto();
        $producto->consultarP($datos['codigo']);

        if($producto->getProdu_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $producto->getProdu_codi(),
                'producto' => $producto->getProdu_nomb(),
                'precio' =>$producto->getProdu_precio(),
                'stock' => 1,
                /*'proveedor' =>$producto->getProve_nomb_comer(),
                'tipo' =>$producto->getTipo_prod_nomb(),*/
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;    

    case 'listar':
        $producto = new Producto();
        $listado = $producto->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
