<!-- quick email widget -->
<div id="seccion-cliente">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">&nbspGestión de Cliente</i>
        <!-- tools box   far fa-building-->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times-circle"></i></button>
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


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_codi">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_codi" name="cliente_codi" placeholder="Ingrese Codigo" value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="cliente_cedula">Cedula:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cliente_cedula" name="cliente_cedula" placeholder="Ingrese Cedula"
                            value = "">
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
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Ciudad">Grabar Ciudad</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div> <!-- codigo listo, funcionando -->