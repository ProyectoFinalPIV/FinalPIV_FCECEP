<?php
 
require_once 'farmacia_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $farmacia = new Farmacia();
        $resultado = $farmacia->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $farmacia = new Farmacia();
		$resultado = $farmacia->nuevo($datos);
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
		$farmacia = new Farmacia();
		$resultado = $farmacia->borrar($datos['codigo']);
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
        $farmacia = new Farmacia();
        $farmacia->consultar($datos['codigo']);

        if($farmacia->getFarma_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $farmacia->getFarma_codi(),
                'farmacia' => $farmacia->getfarma_nomb(),
                'direccion' => $farmacia->getfarma_dir(),
                'ciudad' =>$farmacia->getCiudad_id(),
                'telefono' => $farmacia->getfarma_tel(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $farmacia = new Farmacia();
        $listado = $farmacia->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>