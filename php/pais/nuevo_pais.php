<!-- quick email widget -->
<div id="seccion-pais">
	<div class="box-header">
    	<i class="fas fa-building" aria-hidden="true">&nbspGestión de País</i>
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
    
                <form class="form-horizontal" role="form"  id="fpais">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="pais_id">Código:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pais_id" name="pais_id" placeholder="Ingrese Codigo"value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pais_nom">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pais_nom" name="pais_nom" placeholder="Ingrese Nombre País"
                            value = "">
                        </div>
                    </div>
					
					
                    <!--<div class="form-group">
                        <label class="control-label col-sm-2" for="pais_id">País:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="pais_id" name="pais_id">
                         
							</select>	
                        </div>
                    </div>-->

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar País">Grabar País</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div> <!-- codigo listo, funcionando -->