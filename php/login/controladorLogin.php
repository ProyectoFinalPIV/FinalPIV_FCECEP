<?php
 /*$datos = array("login_codi=".$_POST['login_codi'], "&login_nick=".$_POST['login_nick'], "&login_pass=".$_POST['login_pass'], 
                "&login_esta=".$_POST['login_esta'], "&rol_id=".$_POST['rol_id'], $_POST['accion']);
foreach($datos as $clave){
                echo $clave;
}*/
require_once 'login_modelo.php';
$datos = $_GET;

switch ($_GET['accion']){
    case 'editar':
        $login = new Login();
		$resultado = $login->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $login = new Login();
		$resultado = $login->nuevo($datos);
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
        $login = new Login();
		$resultado = $login->borrar($datos['codigo']);
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
        $login = new Login();
        $login->consultar($datos['codigo']);

        if($login->getLogin_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $login->getLogin_codi(),
                'usuario' => $login->getLogin_nick(),
                'contrasena' => $login->getLogin_pass(),
                'estado' => $login->getLogin_esta(),
                'rol' => $login->getRol_id(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $login = new Login();
        $listado = $login->lista();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>
