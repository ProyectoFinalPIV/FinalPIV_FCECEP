<div id="nuevo-editar" class="hide">
		<!-- div para cargar el formulario para una nueva farmacia o editar una comuna -->
</div>

<div id="farmacia">
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" title="Nueva Farmacia"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="glyphicon glyphicon-remove"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->

<div class="box-body">

	<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>Ciudad</th>
				<th>Teléfono</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		
		</tbody>

	</table>
	<li><a  class = "reporte" href="../farmacia/exPDF.php" target="_blank"><i class="fa fa-building"></i> Reporte en PDF</a></li>

</div><!-- /.box-body -->  
<script src="../../js/funcionesFarmacia.js"></script>
</div>  <!-- codigo listo, funcionando -->