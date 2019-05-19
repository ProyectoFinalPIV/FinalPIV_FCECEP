<div id="seccion-login" class="show">
<!--validacion-->
<style type="text/css">
    * { font-family: Verdana; font-size: 96%; }
    label { width: 10em; float: left; }
    label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
    p { clear: both; }
    .submit { margin-left: 12em; }
    em { font-weight: bold; padding-right: 1em; vertical-align: top; }
    input.error { border: 1px solid red; }
</style>

<script language="javascript" src="js/jquery.validate.js"></script>
<!--Fin libreias Validacion-->
<script language="javascript">
$(document).ready(function(){
	$("#flogin").validate({
			rules: {
    			login_nick: {
                      required: true,
                      equalTo: "#login_nick"
      			},
				login_pass: "required",
    			login_pass2: {
      				required: true,
					equalTo: "#login_pass"
    			}
  			},
			messages:{
				
				login_nick: {
					required: "Dato obligatorio"
                },
				login_pass: {
					required: "Dato obligatorio"
				},
				login_pass2: {
					required: "Dato obligatorio",
					equalTo: "Password Diferente"
				},
				
            }            
        });
        
    });
</script>



	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Persona</i>
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
    
                <form class="form-horizontal" role="form"  id="flogin">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="login_codi">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login_codi" name="login_codi" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="login_nick">Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login_nick" name="login_nick" placeholder="Ingrese Usuario"
                                value = "" require>
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="login_pass">Contraseña:</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="login_pass" name="login_pass" placeholder="Ingrese Contraseña"
                                    value = "" require>
                                      
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="login_pass2">Comfirmar Contraseña:</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="login_pass2" name="login_pass2" placeholder="Confirmar Contraseña"
                                    value = "">
                            </div>
                        </div>
                        
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="login_esta"></label>
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="login_esta" name="login_esta" placeholder="Ingrese Estado"
                            value = "activo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rol_id"></label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="rol_id" name="rol_id" placeholder="Ingrese Rol"
                            value = "4">
                        </div>
                    </div>
          
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Persona">Grabar Persona</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>
    
					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
            </fieldset>

		</form>
    </div>        
</div>
<script src="js/funcionesLogin2.js"></script>
