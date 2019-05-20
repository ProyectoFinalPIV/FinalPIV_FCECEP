<!-- quick email widget -->
<div id="seccion-proveedor">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Proveedor</i>
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
    
                <form class="form-horizontal" role="form"  id="fproveedor">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="prove_codi">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prove_codi" name="prove_codi" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="docu_codi">Tipo Documento: </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="docu_codi" name="docu_codi">
                         
							</select>	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="prove_cedula">Numero:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prove_cedula" name="prove_cedula" placeholder="Ingrese Numero Cedula"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="prove_nomb_comer">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prove_nomb_comer" name="prove_nomb_comer" placeholder="Ingrese Nombre Comercial"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="prove_dir">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prove_dir" name="prove_dir" placeholder="Ingrese Direccion"
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
                        <label class="control-label col-sm-2" for="prove_tel">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prove_tel" name="prove_tel" placeholder="Ingrese Telefono"
                            value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="prove_repre">Representante Legal:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prove_repre" name="prove_repre" placeholder="Ingrese Nombre"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Municipio">Grabar Municipio</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>