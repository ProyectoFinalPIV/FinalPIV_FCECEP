   <div id="seccion-usuario"> <!-- /*Editado Completo 12-02-19 */ -->
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Usuario</i>
        
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
    
                <form class="form-horizontal" role="form"  id="fusuario">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_Usuario">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_Usuario" name="id_Usuario" placeholder="Ingrese Codigo"
                            value = "" readonly="true">
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
                            <select class="form-control" id="pass_Usuario" name="pass_Usuario" placeholder="Ingrese Nombre Contraseña">
							
							</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mail_Usuario">Correo Electrónico:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mail_Usuario" name="mail_Usuario" placeholder="Ingrese E-mail"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cedula_Client">Cedula Cliente:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cedula_Client" name="cedula_Client" placeholder="Ingrese cedula"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cedula_Emp">Cedula Empleado:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cedula_Emp" name="cedula_Emp" placeholder="Ingrese cedula"
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
                        <label class="control-label col-sm-2" for="status_Rol">Status Rol:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status_Rol" name="status_Rol" placeholder="Estado"
                            value = "" readonly="true">
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