<?php  /*Editado Completo 12-02-19 */
 
require_once 'usuario_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $usuario = new Usuario();
        $resultado = $usuario->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $usuario = new Usuario();
		$resultado = $usuario->nuevo($datos);
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
		$usuario = new Usuario();
		$resultado = $usuario->borrar($datos['id_Usuario']);
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
        $usuario = new Usuario();
        $usuario->consultar($datos['id_Usuario']);

        if($usuario->getId_Usuario() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_Usuario' => $usuario->getId_Usuario(),
                'nom_Usuario' => $usuario->getNom_Usuario(),
                'pass_Usuario' =>$usuario->getPass_Usuario(),
                'mail_Usuario' =>$usuario->getMail_Usuario(),
                'cedula_Client' =>$usuario->getCedula_Client(),
                'cedula_Emp' =>$usuario->getCedula_Emp(),
                'id_Rol' =>$usuario->getId_Rol(),
                'status_Rol' =>$usuario->getStatus_Rol(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $usuario = new Usuario();
        $listado = $usuario->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>