<?php


session_start();

$username= htmlspecialchars(trim($_POST['username']));

$pass= htmlspecialchars(trim($_POST['pass']));
//echo $username;
//echo $pass;
require_once("serv.php");

$sql=mysqli_query($mysqli,"SELECT log.login_nick, log.login_pass, log.login_esta, log.rol_id,  log.emple_codi, log.admin_codi, log.admin_farma_codi, log.cliente_codi
								FROM tb_login as log 
								inner join tb_rol as rol on (rol.rol_id = log.rol_id) 
								WHERE log.login_nick = '$username'");
								//AND log.login_pass='$pass'");

if($f=mysqli_fetch_assoc($sql)){
	/*echo " ".$f['login_pass'];
	$passBD = $f['login_pass'];
  if(password_verify($pass, '$2y$10$2FQycdZdyrgKn')){
	  echo "---eiman";
  }else{
	  echo "----males";
  }*/

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
				echo "<script>location.href='../adminsys/index.php'</script>";

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

				echo '<script>alert("CREDENCIALES 4 INCORRECTAS");</script> ';			
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

?>