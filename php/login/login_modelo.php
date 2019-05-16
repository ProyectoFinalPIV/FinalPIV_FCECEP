<?php


session_start();

$username=$_POST['username'];

$pass=$_POST['pass'];
//echo $username;
//echo $pass;
require_once("serv.php");

$sql=mysqli_query($mysqli,"SELECT log.login_nick, log.login_pass, log.login_esta, log.rol_id,  log.emple_codi, log.admin_codi, log.admin_farma_codi, log.cliente_codi
								FROM tb_login as log 
								inner join tb_rol as rol on (rol.rol_id = log.rol_id) 
								WHERE log.login_nick = '$username'
								AND log.login_pass='$pass'");

if($f=mysqli_fetch_assoc($sql)){

	
	switch($f['rol_id']){

		case '1':
			
			if(($pass==$f['login_pass']) && ($username==$f['login_nick'] && ($f['rol_id']=='1') && ($f['login_esta'] == 'activo'))){
				$_SESSION['user']=$f['login_nick'];             
				$_SESSION['rol']=$f['rol_id'];
				
				echo "<script>location.href='../adminsys/index.php'</script>";
			}else{
				echo '<script>alert("CREDENCIALES 1 INCORRECTAS")</script> ';
			
				echo "<script>location.href='../../index.html'</script>";
			}
			
		break;
		
		case '2':
			
			if($pass == $f['login_pass'] && $username == $f['login_nick'] && $f['rol_id'] == '2' && $f['login_esta'] == 'activo'){

				$_SESSION['user']=$f['login_nick'];			
				$_SESSION['rol']=$f['rol_id'];
				echo "<script>location.href='../adminfarma/index.php'</script>";

			   } else {

				echo '<script>alert("CREDENCIALES 2 INCORRECTAS")</script> ';			
				echo "<script>location.href='../../index.html'</script>";

			}
			
		break;
		case '3':
			
			if(($pass==$f['login_pass']) && ($username==$f['login_nick'] && ($f['rol_id']=='3') && ($f['login_esta'] == 'activo') )){

				$_SESSION['user']=$f['login_nick'];
				$_SESSION['rol']=$f['rol_id'];
				$_SESSION['admin_farma_codi']=$f['admin_farma_codi'];
				$_SESSION['emple_codi']=$f['emple_codi'];
				echo "<script>location.href='../empleado/index.php'</script>";

			} else {

				echo '<script>alert("CREDENCIALES 3 INCORRECTAS");</script> ';			
				echo "<script>location.href='../../index.html';</script>";
			}
			
		break;
		case '4':
			
			if(($pass==$f['login_pass']) && ($username==$f['login_nick'] && ($f['rol_id']=='4') && ($f['login_esta'] == 'activo') )){

				$_SESSION['user']=$f['login_nick'];
				$_SESSION['rol']=$f['rol_id'];
				$_SESSION['emple_codi']=$f['emple_codi'];
				$_SESSION['cliente_codi']=$f['cliente_codi'];
				echo "<script>location.href='../producto/home.php'</script>";

			} else {

				echo '<script>alert("CREDENCIALES 3 INCORRECTAS");</script> ';			
				echo "<script>location.href='../../index.html';</script>";
			}
			
		break;
		
		default:
			
			echo '<script>alert("CREDENCIALES df INCORRECTAS");</script> ';
			echo "<script>location.href='../../index.html';</script>";
			
		break;
	}

} else if($f == null){
	
	echo '<script>alert("CREDENCIALES null INCORRECTAS");</script> ';
	echo "<script>location.href='../../index.html';</script>";
	
}

$mysqli->close();




	require_once('../modeloAbstractoDB.php');
	class Login extends ModeloAbstractoDB {
		public $login_codi;
		public $login_nick;
        public $login_pass;
        public $login_esta;
		public $rol_id;
		public $rol_nomb;
        public $emple_codi;
        public $admin_codi;
		public $admin_farma_codi;
		public $cliente_codi;
       
		
		function __construct() {
			//$this->db_name = '';
		}
		
		public function getLogin_codi()
		{
				return $this->login_codi;
		}

		public function getLogin_nick()
		{
				return $this->login_nick;
		}
		public function getLogin_pass()
        {
                return $this->login_pass;
		}
		public function getLogin_esta()
        {
                return $this->login_esta;
		}
		public function getRol_id()
		{
				return $this->rol_id;
		}
		public function getRol_nomb()
		{
				return $this->rol_nomb;
		}
		public function getEmple_codi()
        {
                return $this->emple_codi;
		}
		public function getAdmin_codi()
        {
                return $this->admin_codi;
		}
		public function getAdmin_farma_codi()
		{
				return $this->admin_farma_codi;
		}
		public function getCliente_codi()
		{
				return $this->cliente_codi;
		}

		public function consultar($login_codi='') {
			if($login_codi != ''):
				$this->query = "
				SELECT *
				FROM tb_login
				WHERE login_codi = '$login_codi' ORDER BY login_codi;
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function lista() {
			$this->query = "
			SELECT login_codi, login_nick, login_pass, login_esta, lo.rol_id, r.rol_nom, 
					lo.cliente_codi, c.cliente_nomb
					FROM tb_login AS lo
					INNER JOIN tb_rol AS r ON (lo.rol_id = r.rol_id)
					INNER JOIN tb_cliente AS c ON (lo.cliente_codi = c.cliente_codi) ORDER BY login_codi;
c			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function listaLogin() {
			$this->query = "
			SELECT *
			FROM tb_persona order by perso_nomb
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		

		public function nuevo($datos=array()) {
			if(array_key_exists('login_codi', $datos)):
				//$datos = utf8_string_array_encode($datos);
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$login_nick= utf8_decode($login_nick);
				$login_pass = utf8_decode($login_pass);
				$login_esta = utf8_decode($login_esta);
				
				$this->query = "
				INSERT INTO tb_login
				(login_codi, login_nick, login_pass, login_esta, rol_id)
				  VALUES (null'$login_nick','$login_pass','$login_esta','$rol_id');
				";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$login_nick= utf8_decode($login_nick);
			$login_pass= utf8_decode($login_pass);
			$this->query = "
			UPDATE tb_login
			SET login_nick='$login_nick',
			login_pass='$login_pass'
			WHERE login_codi = '$login_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($login_codi='') {
			$this->query = "
			DELETE FROM tb_login
			WHERE login_codi = '$login_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}

	}

	
?>