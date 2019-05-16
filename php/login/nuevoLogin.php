<!-- quick email widget -->
<div id="seccion-login">
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
                                value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="login_pass">Contraseña:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login_pass" name="login_pass" placeholder="Ingrese Contraseña"
                                value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_apel_2">Comfirmar Contraseña:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_apel_2" name="perso_apel_2" placeholder="Confirmar Contraseña"
                                value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="login_estado"></label>
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="login_estado" name="login_estado" placeholder="Ingrese Estado"
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
                        <label class="control-label col-sm-2" for="cliente_codi"></label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="cliente_codi" name="cliente_codi" placeholder="Ingrese Codigo del Clientes"
                                value = "">	
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