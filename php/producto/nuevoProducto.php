<!-- quick email widget -->
<div id="seccion-producto">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Productos</i>
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
                        <label class="control-label col-sm-2" for="Id_Producto">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Id_Producto" name="Id_Producto" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Nom_Prod">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nom_Prod" name="Nom_Prod" placeholder="Ingrese Nombre"
                            value = "">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-sm-2" for="Precio_Prod">Precio:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Precio_Prod" name="Precio_Prod" placeholder="Ingrese Precio"
                            value = "">
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Nit_Prov">Proveedor:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Nit_Prov" name="Nit_Prov">
                         
							</select>	
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_tipo_prod">Tipo Producto:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_tipo_prod" name="id_tipo_prod">
                         
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Producto">Grabar Producto</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>