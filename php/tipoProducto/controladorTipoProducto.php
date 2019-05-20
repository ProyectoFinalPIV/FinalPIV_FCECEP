<?php
 
require_once 'tipoProducto_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $tipoproducto = new TipoProducto();
        $resultado = $tipoproducto->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $tipoproducto = new TipoProducto();
		$resultado = $tipoproducto->nuevo($datos);
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
        $tipoproducto = new TipoProducto();
		$resultado = $tipoproducto->borrar($datos['codigo']);
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
        $tipoproducto = new TipoProducto();
        $tipoproducto->consultar($datos['codigo']);

        if($tipoproducto->getTipo_prod_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $tipoproducto->getTipo_prod_codi(),
                'nombre' => $tipoproducto->getTipo_prod_nomb(),
                'descripcion' =>$tipoproducto->getTipo_prod_desc(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $tipoproducto = new TipoProducto();
        $listado = $tipoproducto->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
