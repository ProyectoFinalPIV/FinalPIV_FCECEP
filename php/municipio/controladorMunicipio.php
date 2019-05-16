<?php
 
require_once 'municipio_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $municipio = new Municipio();
		$resultado = $municipio->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $municipio = new Municipio();
		$resultado = $municipio->nuevo($datos);
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
		$municipio = new Municipio();
		$resultado = $municipio->borrar($datos['codigo']);
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
        $municipio = new Municipio();
        $municipio->consultar($datos['codigo']);

        if($municipio->getMuni_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $municipio->getMuni_codi(),
                'municipio' => $municipio->getMuni_nomb(),
                'departamento' =>$municipio->getDepa_codi(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $municipio = new Municipio();
        $listado = $municipio->lista();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>
