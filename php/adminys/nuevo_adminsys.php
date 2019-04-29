<?php
    require_once('../pais/pais_modelo.php');
    $pais = new Pais();
    $listaPais=$pais->listaPais();
?>  
<!-- quick email widget -->
    <div class="box-body">

        <div align ="center">
                <div id="actual"> 
                </div>
        </div>


        <div class="panel-group"><div class="panel panel-default">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fciudades">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ciudad_id">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ciudad_id" name="ciudad_id" placeholder="Ingrese código de la ciudad"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ciudad_nom">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ciudad_nom" name="ciudad_nom" placeholder="Ingrese nombre de la ciudad" 
                            value = ""><!-- etiquetas -->
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pais_id">Pais:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="pais_id" name="pais_id">
                            <option value="" selected>Seleccione ...</option>
                                <?php foreach($listaPais as $fila){ ?>
                                <option value="<?php echo trim($fila['pais_id']); ?>" >
                                <?php echo utf8_encode(trim($fila['pais_nom'])); ?> </option>

                                <?php } ?>
                            </select>   
                        </div>
                    </div>

                     <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabarciu" class="btn btn-primary" data-toggle="tooltip" title="Grabar Ciudades">Grabar Ciudades</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrarciu" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

                    <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
            </fieldset>

        </form>
    </div>
