<div id="seccion-login">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Persona</i>
        
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
    
                <form class="form-horizontal" role="form"  id="flogin">
                    
                <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_codi">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_codi" name="perso_codi" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_nomb">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_nomb" name="perso_nomb" placeholder="Ingrese Nombre"
                            value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_apel">Primer Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_apel" name="perso_apel" placeholder="Ingrese Apellido"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_apel_2">Segundo Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_apel_2" name="perso_apel_2" placeholder="Ingrese Apellido"
                            value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="esta_civi_codi">Estado Civil: </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="esta_civi_codi" name="esta_civi_codi">
                         
							</select>	
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
                        <label class="control-label col-sm-2" for="mun_codi_expe">Municipio de Expedicion:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="mun_codi_expe" name="mun_codi_expe">
                         
							</select>	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="barr_codi">Barrio:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="barr_codi" name="barr_codi">
                         
							</select>	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_dire">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_dire" name="perso_dire" placeholder="Ingrese la Direccion"
                            value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_tele_casa">Telefono Casa:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_tele_cas" name="perso_tele_codi" placeholder="Ingrese Numero Telefono Casa"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_tele_ofic">Telefono Oficina:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_tele_ofic" name="perso_tele_ofic" placeholder="Ingrese Numeero Telefono Oficina"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_celu">Celular:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_celu" name="perso_celu" placeholder="Ingrese Numero Celular"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="perso_mail">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="perso_mail" name="perso_mail" placeholder="Ingrese Correo"
                            value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ocup_codi">Ocupacion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ocup_codi" name="ocup_codi" placeholder="Ingrese Ocupacion"
                            value = "">
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gene_codi">Genero : </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gene_codi" name="gene_codi">
                         
							</select>	
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sang_codi">Tipo Sangre: </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sang_codi" name="sang_codi">
                         
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Municipio" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>