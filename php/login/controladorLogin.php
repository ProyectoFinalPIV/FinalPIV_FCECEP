<?php
 
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

        if($login->getPerso_codi() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $login->getPerso_codi(),
                'nombre' => $login->getPerso_nomb(),
                'apellido1' => $login->getPerso_apel(),
                'apellido2' => $login->getPerso_apel_2(),
                'estadoC' => $login->getEsta_civi_codi(),
                'documento' => $login->getDocu_codi(),
                'municipio' => $login->getMuni_codi_expe(),
                'barrio' => $login->getBarr_codi(),
                'direccion' => $login->getPerso_dire(),
                'telefono1' => $login->getPerso_tele_casa(),
                'telefono2' => $login->getPerso_tele_ofic(),
                'celular' => $login->getPerso_celu(),
                'email' => $login->getPerso_mail(),
                'ocupacion' => $login->getOcup_codi(),
                'genero' =>$login->getGene_codi(),
                'sangre' => $login->getSang_codi(),

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
