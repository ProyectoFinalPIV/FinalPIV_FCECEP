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
            'codigo' => $cliente->getCliente_codi(),
            'cedula' => $cliente->getCliente_cedula(),
            'documento' => $cliente->getDocu_codi(),
            'genero' => $cliente->getGene_codi(),
            'nombre' => $cliente->getCliente_nomb(),
            'p_apellido' => $cliente->getCliente_apel(),
            's_apellido' => $cliente->getCliente_apel2(),
            'f_naci' => $cliente->getCliente_fec_nac(),
            'telefono' => $cliente->getCliente_tel(),
            'celular' => $cliente->getCliente_cel(),
            'direccion' => $cliente->getCliente_dir(),
            'ciudad' =>$cliente->getCiudad_id(),
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
} //Codigo Listo - funcionando
?>