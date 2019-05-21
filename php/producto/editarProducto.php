   <div id="seccion-producto">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Productos</i>
        
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
    
                <form class="form-horizontal" role="form"  id="fproducto">


                <div class="form-group">
                        <label class="control-label col-sm-2" for="produ_codi">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="produ_codi" name="produ_codi" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produ_nomb">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="produ_nomb" name="produ_nomb" placeholder="Ingrese Nombre"
                            value = "">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-sm-2" for="produ_precio">Precio:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="produ_precio" name="produ_precio" placeholder="Ingrese Precio"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="produ_stock">Cantidad:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="produ_stock" name="produ_stock" placeholder="Ingrese Precio"
                            value = "">
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="prove_codi">Proveedor:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="prove_codi" name="prove_codi">
                         
							</select>	
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tipo_prod_codi">Tipo Producto:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tipo_prod_codi" name="tipo_prod_codi">
                         
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Comuna" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>