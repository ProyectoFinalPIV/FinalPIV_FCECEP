   <div id="seccion-cliente">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">&nbspGestion de Cliente</i>
        
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
    
                <form class="form-horizontal" role="form"  id="fcliente">

                <fieldset> <!-- Enmarca el formulario -->
 					<div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_codi">Código:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_codi" name="cliente_codi" placeholder="Código Automático"value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_cedula">Cedula:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_cedula" name="cliente_cedula" placeholder="Ingrese Cedula"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="docu_codi">Tipo Documento:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="docu_codi" name="docu_codi">
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gene_codi">Genero:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gene_codi" name="gene_codi">
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_nomb">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_nomb" name="cliente_nomb" placeholder="Ingrese Nombre Cliente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_apel">Primer Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_apel" name="cliente_apel" placeholder="Ingrese Apellido Cliente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_apel2">Segundo Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_apel2" name="cliente_apel2" placeholder="Ingrese Apellido Cliente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_fec_nac">Fecha de Nacimiento:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="cliente_fec_nac" name="cliente_fec_nac" placeholder="Ingrese Fecha de Nacimiento"
                            value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_tel">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_tel" name="cliente_tel" placeholder="Ingrese Telefono"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_cel">Celular:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_cel" name="cliente_cel" placeholder="Ingrese Número Celular"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_dir">Dirección:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_dir" name="cliente_dir" placeholder="Ingrese Dirección"
                            value = "">
                        </div>
                    </div>					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ciudad_id">Ciudad:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="ciudad_id" name="ciudad_id">
							</select>
                        </div>
                    </div>

                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Ciudad" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div> <!-- codigo listo, funcionando -->