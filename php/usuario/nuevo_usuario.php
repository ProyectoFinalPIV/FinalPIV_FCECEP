<!-- quick email widget --> <!-- /*Editado Completo 12-02-19 */ -->
<?php /*<div id="seccion-comuna">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Usuario</i>
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

		<div align ="center">
				<div id="actual"> 
				</div>
		</div>


        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fusuario"><!-- va en el js -->


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_Usuario">Código:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_Usuario" name="id_Usuario" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nom_Usuario">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom_Usuario" name="nom_Usuario" placeholder="Ingrese Nombre Usuario"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pass_Usuario">Contraseña:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pass_Usuario" name="pass_Usuario" placeholder="Contraseña"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mail_Usuario">Correo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mail_Usuario" name="mail_Usuario" placeholder="Ingrese E-mail"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cedula_Client">Cedula Cliente:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cedula_Client" name="cedula_Client" placeholder="Ingrese Cedula Cliente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cedula_Emp">Cedula Empleado:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cedula_Emp" name="cedula_Emp" placeholder="Ingrese Cedula Empleado"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_Rol">Rol:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_Rol" name="id_Rol" placeholder="Ingrese Rol"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="status_Rol">Status:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status_Rol" name="status_Rol" placeholder="Estado del Rol"
                            value = "" readonly="true">
                        </div>
                    </div>
					
					<!--
                    <div class="form-group"> </!-- Muestra listado a seleccionar --/>
                        <label class="control-label col-sm-2" for="muni_codi">Municipio:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="muni_codi" name="muni_codi">
                         
							</select>	
                        </div>
                    </div> -->

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Usuario">Grabar Usuario</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div> -->*/?>
<!-- -------------------------- -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../css/register.css">

<div class="testbox">
  <h1>Registration</h1>

  <form role="form" action="usuario_modelo.php" method="">
      <hr>
    <div class="accounttype">
      <input type="radio" value="None" id="radioOne" name="account" checked/>
      <label for="radioOne" class="radio" chec>Personal</label>
      <input type="radio" value="None" id="radioTwo" name="account" />
      <label for="radioTwo" class="radio">Company</label>
    </div>
  <hr>
  
  <label id="icon" for="nom_Usuario"><i class="icon-user"></i></label>
  <input type="text" name="nom_Usuario" id="nom_Usuario" placeholder="Name" required/>
  <label id="icon" for="mail_Usuario"><i class="icon-envelope "></i></label>
  <input type="text" name="mail_Usuario" id="mail_Usuario" placeholder="Email" required/>
  <label id="icon" for="id_Usuario"><i class="icon-barcode"></i></label>
  <input type="text" name="id_Usuario" id="id_Usuario" placeholder="Cédula" required/>
  <label id="icon" for="pass_Usuario"><i class="icon-shield"></i></label>
  <input type="password" name="pass_Usuario" id="pass_Usuario" placeholder="Password" required/>
  <!--<div class="gender">
    <input type="radio" value="None" id="male" name="gender" checked/>
    <label for="male" class="radio" chec>H</label>
    <input type="radio" value="None" id="female" name="gender" />
    <label for="female" class="radio">M</label>
   </div> -->
   <div>
   <a href="../../index.html" class="button">Cancelar</a>
   <button type="submit" class="button">Insertar</button>
   <!--<a href="usuario_modelo.php" class="button">Registrar</a>-->
   </div>
   <p>Al hacer clic en Registrarse, usted acepta nuestros <a href="#">términos y condiciones.</a>.</p>
</form>
</div>
<!--  Fuente:
    Formulario de Registro: (https://webgenio.com/blog/40-bonitos-formularios-css-registros-login-web/)
    https://codepen.io/afirulaf/pen/djAen
    iconos
    https://getbootstrap.com/2.3.2/base-css.html#images -->
