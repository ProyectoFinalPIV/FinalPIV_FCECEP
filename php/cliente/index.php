<div id="nuevo-editar" class="hide">
		<!-- div para cargar el formulario para un nuevo cliente o editar un cliente -->
</div>

<div id="cliente">
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" title="Nuevo Cliente"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="glyphicon glyphicon-remove"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->

<div class="box-body">

	<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Código</th>
				<th>Cedula</th>
				<th>Documento</th>
				<th>Género</th>
				<th>Nombre</th>
				<th>Primer Apellido</th>
				<th>Segundo Apellido</th>
				<th>Fecha de Nacimiento</th>
				<th>Telefono</th>
				<th>Celular</th>
				<th>Dirección</th>
				<th>Ciudad</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		
		</tbody>

	</table>
	<li><a  class = "reporte" href="../cliente/exPDF.php" target="_blank"><i class="fa fa-building"></i> Reporte en PDF</a></li>

</div><!-- /.box-body -->  
<script src="../../js/funcionesCliente.js"></script>
</div> <!-- codigo listo, funcionando -->