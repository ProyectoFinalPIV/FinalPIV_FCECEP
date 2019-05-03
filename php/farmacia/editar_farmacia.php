   <div id="seccion-farmacia">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Farmacia</i>
        
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
    
                <form class="form-horizontal" role="form"  id="ffarmacia">

                <fieldset> <!-- Enmarca el formulario -->
 					<div class="form-group">
                        <label class="control-label col-sm-2" for="farma_codi">Código:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="farma_codi" name="farma_codi" placeholder="Código Automático"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="farma_nomb">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="farma_nomb" name="farma_nomb" placeholder="Ingrese Nombre farmacia"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="farma_dir">Dirección:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="farma_dir" name="farma_dir" placeholder="Ingrese Dirección Farmacia"
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
                        <label class="control-label col-sm-2" for="farma_tel">Teléfono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="farma_tel" name="farma_tel" placeholder="Ingrese Dirección Farmacia"
                            value = "">
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
</div>