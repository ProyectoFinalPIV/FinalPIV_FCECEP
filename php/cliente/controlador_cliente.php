<?php
 
require_once 'cliente_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $cliente = new Cliente();
        $resultado = $cliente->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $cliente = new Cliente();
		$resultado = $cliente->nuevo($datos);
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
		$cliente = new Cliente();
		$resultado = $cliente->borrar($datos['codigo']);
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
        $cliente = new Cliente();
        $cliente->consultar($datos['codigo']);

        if($cliente->getCliente_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
            'cliente_codi' => $cliente->getCliente_codi(),
            'cliente_cedulaº' => $cliente->getCliente_cedula(),
            'docu_codi' => $cliente->getDocu_codi(),
            'gene_codi' => $cliente->getGene_codi(),
            'cliente_nomb' => $cliente->getCliente_nomb(),
            'cliente_apel' => $cliente->getClilente_apel(),
            'cliente_apel2' => $cliente->getClilente_apel2(),
            'cliente_fec_nac' => $cliente->getCliente_fec_nac(),
            'cliente_tel' => $cliente->getCliente_tel(),
            'cliente_cel' => $cliente->getCliente_cel(),
            'cliente_dir' => $cliente->getCliente_dir(),
            'ciudad_id' =>$cliente->getCiudad_id(),
            'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $cliente = new Cliente();
        $listado = $cliente->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>