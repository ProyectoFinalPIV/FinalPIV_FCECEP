<?php

    session_start();

	$username=$_POST['username'];
	
	$pass=$_POST['pass'];

	require_once("../modeloAbstractoDB.php");
	
	$sql=mysqli_query($mysqli,"SELECT log.login_nick, log.login_pass, log.login_esta, log.rol_id,  log.emple_codi, log.admin_codi, log.admin_farma_codi, log.cliente_codi
    FROM tb_login as log 
    inner join tb_rol as rol on (rol.rol_id = log.rol_id) 
	WHERE log.login_nick = '$username'
    AND log.login_pass='$pass'");
	
	if($f=mysqli_fetch_assoc($sql)){
        
        switch($f['rol_id']){

            case '1':
                
                if(($pass==$f['login_pass']) && ($username==$f['login_nick'] && ($f['rol_id']=='1') )){
                    $_SESSION['user']=$f['login_nick'];             
                    $_SESSION['rol']=$f['rol_id'];
                    
                    echo "<script>location.href='../adminsys/index.php'</script>";
                }else{
                    echo '<script>alert("CREDENCIALES 1 INCORRECTAS")</script> ';
                
                    echo "<script>location.href='index.html'</script>";
                }
                
            break;
            
            case '2':
                
                if($pass == $f['login_pass'] && $username == $f['login_nick'] && $f['rol_id'] == '2'){
    
    				$_SESSION['user']=$f['login_nick'];			
    				$_SESSION['rol']=$f['rol_id'];
    				echo "<script>location.href='menu_Profe.php'</script>";
    
    		   	} else {
    
    				echo '<script>alert("CREDENCIALES 2 INCORRECTAS")</script> ';			
    				echo "<script>location.href='index.html'</script>";
    
    			}
                
            break;
            case '3':
                
                if(($pass==$f['login_pass']) && ($username==$f['login_nick'] && ($f['rol_id']=='3') )){
    
    				$_SESSION['user']=$f['login_nick'];
    				$_SESSION['rol']=$f['rol_id'];
    				$_SESSION['profesor_id']=$f['profesor_id'];
    				$_SESSION['estudiante_id']=$f['estudiante_id'];
    				echo "<script>location.href='menu_admin.php'</script>";
    
    	        } else {
    
    				echo '<script>alert("CREDENCIALES 3 INCORRECTAS");</script> ';			
    				echo "<script>location.href='index.html';</script>";
    			}
                
            break;
            
            default:
                
                echo '<script>alert("CREDENCIALES df INCORRECTAS");</script> ';
                echo "<script>location.href='index.html';</script>";
                
            break;
        }

	} else if($f == null){
	    
	    echo '<script>alert("CREDENCIALES null INCORRECTAS");</script> ';
	    echo "<script>location.href='index.html';</script>";
	    
	}


?>