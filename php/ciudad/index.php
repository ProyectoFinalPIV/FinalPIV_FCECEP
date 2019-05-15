<div id="nuevo-editar" class="hide">
		<!-- div para cargar el formulario para una nueva ciudad o editar una comuna -->
</div>

<div id="ciudad">
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" title="Nueva Ciudad"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="glyphicon glyphicon-remove"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->

<div class="box-body">

	<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>País</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		
		</tbody>

	</table>
	<li><a  class = "reporte" href="../ciudad/exPDF.php" target="_blank"><i class="fa fa-building"></i> Reporte en PDF</a></li>
	<!--<a class = "reporte" href="../../recursos/reporte/exPDF.php" target="_blank" role="button">Reporte</a>-->
<!--<button class = "reporte" href="../../recursos/reporte/exPDF.php" target="_blank"><i class="fa fa-building"></i>Reporte PDF</button>-->
</div><!-- /.box-body -->  
<script src="../../js/funcionesCiudad.js"></script>
</div> <!-- codigo listo, funcionando -->