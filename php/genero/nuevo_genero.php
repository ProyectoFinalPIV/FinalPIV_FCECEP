<!-- quick email widget -->
<div id="seccion-genero">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">&nbspGestión de Genero</i>
        <!-- tools box far fa-building -->
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
    
                <form class="form-horizontal" role="form"  id="fgenero">
                 <fieldset> <!-- Enmarca el formulario -->
 					<div class="form-group">
                        <label class="control-label col-sm-2" for="gene_codi">Código:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gene_codi" name="gene_codi" placeholder="Código Automático" value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gene_nomb">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gene_nomb" name="gene_nomb" placeholder="Ingrese Genero"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Genero">Grabar Genero</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div> <!-- codigo listo, funcionando -->