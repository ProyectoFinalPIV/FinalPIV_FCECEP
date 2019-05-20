<?php
 
require_once 'proveedor_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $proveedor = new Proveedor();
        $resultado = $proveedor->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $proveedor = new Proveedor();
		$resultado = $proveedor->nuevo($datos);
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
        $proveedor = new Proveedor();
		$resultado = $proveedor->borrar($datos['codigo']);
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
        $proveedor = new Proveedor();
        $proveedor->consultar($datos['codigo']);

        if($proveedor->getProve_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $proveedor->getProve_codi(),
                'documento' => $proveedor->getDocu_codi(),
                'cedula' =>$proveedor->getProve_cedula(),
                'nombre' => $proveedor->getProve_nomb_comer(),
                'direccion' =>$proveedor->getProve_dir(),
                'ciudad' =>$proveedor->getCiudad_id(),
                'telefono' =>$proveedor->getProve_tel(),
                'representante' =>$proveedor->getProve_repre(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;
        
    case 'listar':
        $proveedor = new Proveedor();
        $listado = $proveedor->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
