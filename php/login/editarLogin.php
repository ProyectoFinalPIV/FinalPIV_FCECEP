<div id="seccion-login">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Persona</i>
        
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
                                value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="login_pass">Contraseña:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="login_pass" name="login_pass" placeholder="Ingrese Contraseña"
                                    value = "">
                                      
                            </div>
                        </div>
                       
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="login_esta">Estado:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="login_esta" name="login_esta">
                                <option value="seleccione">Seleccione un Estado</option>
                                <option value="activo">activo</option>
                                <option value="inactivo">inactivo</option>
							</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rol_id">Rol:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rol_id" name="rol_id" placeholder="Ingrese Rol"
                            value = "4" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>
          

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Usuario" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>