<div id="nuevo-editar" class="hide">
		<!-- div para cargar el formulario para una nueva comuna o editar una comuna -->
</div>

<div id="comuna">
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" title="Nueva Comuna"><i class="fa fa-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->

<div class="box-body">

	<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Municipio</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		
		</tbody>

	</table>
<button class = "reporte" href="./recursos/reporte/tabla.php" target="_blank"><i class="fas fa-building"></i>Reporte PDF</button>
</div><!-- /.box-body -->  
<script src="js/funcionesComuna.js"></script>
</div>