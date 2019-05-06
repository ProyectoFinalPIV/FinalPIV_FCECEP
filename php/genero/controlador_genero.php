<?php
 
require_once 'genero_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $genero = new Genero();
        $resultado = $genero->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $genero = new Genero();
		$resultado = $genero->nuevo($datos);
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
		$genero = new Genero();
		$resultado = $genero->borrar($datos['codigo']);
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
        $genero = new Genero();
        $genero->consultar($datos['codigo']);

        if($genero->getGene_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $genero->getGene_codi(),
                'genero' => $genero->getGene_nomb(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $genero = new Genero();
        $listado = $genero->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}  //Codigo listo - funcionando
?>