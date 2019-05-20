<div id="nuevo-carrito" class="hide">
		<!-- div para cargar el formulario para una nueva comuna o editar una comuna -->
</div>

<div id="carrito">
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- //tools box-->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="comprar"  data-toggle="tooltip" title="Comprar Productos">Comprar</button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!--//. tools -->
                  
</div><!-- //.box-header -->

<div class="box-body table-responsive">

	<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Stock</th>
				<th>Proveedor</th>
				<th>Tipo Producto</th>
				<th>&nbsp;</th>
				
			</tr>
		</thead>
		<tbody>
			   <?php
			   $datos= $_GET;

			   foreach($datos as $key => $valor)
			   		
			   ?>
		
		</tbody>

	</table>

</div><!-- /.box-body -->  
<script src="../../js/funcionesMostrarProdu.js"></script>
</div>