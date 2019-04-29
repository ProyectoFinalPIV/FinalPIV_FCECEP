<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login V6</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="../../img/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../css/util_Login.css">
    <link rel="stylesheet" type="text/css" href="../../css/format_Login.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-65 p-b-20">
                <form method="POST" action="login_modelo.php" class="login100-form validate-form">
                    <span class="login100-form-title p-b-50">
                        Bienvenido
                    </span>
                    <span class="login100-form-avatar">
                        <img src="../../img/avatar-01.jpg" alt="AVATAR">
                    </span>

                    <div class="wrap-input100 validate-input m-t-65 m-b-35" data-validate = "Enter username">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="Username"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <ul class="login-more p-t-60">
                        <li class="m-b-8">
                            <span class="txt1">
                                Olvidó
                            </span>

                            <a href="#" class="txt2">
                                Usuario / Contraseña?
                            </a>
                        </li>

                        <li>
                            <span class="txt1">
                                ¿No tienes una cuenta? 
                            </span>

                            <a href="../usuario/nuevo_usuario.php" class="txt2">
                                Sign up
                            </a>
                        </li>
                        
                        <li>
                            <span class="txt1">
                                Volver 
                            </span>

                            <a href="../../index.html" class="txt2">
                                Página de inicio
                            </a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="../../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="../../vendor/bootstrap/js/popper.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="../../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="../../vendor/daterangepicker/moment.min.js"></script>
    <script src="../../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="../../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="../../js/funcionLogin.js"></script>

</body>
</html>
  <!-- https://bootsnipp.com/tags/login?page=2 -->