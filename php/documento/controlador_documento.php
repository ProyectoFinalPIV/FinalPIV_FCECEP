<?php
 
require_once 'documento_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $documento = new Documento();
        $resultado = $documento->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $documento = new Documento();
		$resultado = $documento->nuevo($datos);
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
		$documento = new Documento();
		$resultado = $documento->borrar($datos['codigo']);
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
        $documento = new Documento();
        $documento->consultar($datos['codigo']);

        if($documento->getDocu_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $documento->getDocu_codi(),
                'documento' => $documento->getDocu_nomb(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $documento = new Documento();
        $listado = $documento->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}  //Codigo listo - falta validar
?>