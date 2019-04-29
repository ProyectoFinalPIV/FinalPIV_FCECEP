<?php
	require_once('ciudades_modelo.php');
	$ciudad= new ciudades();
	$listaCiudades =  $ciudad->lista();
	$plano =("../../fpdf/ciudad.txt");
	$archivo = fopen($plano,"w") or die("Problemas en la creacion");
	foreach($listaCiudades as $fila){
		fputs($archivo,$fila['ciudad_id'].",".$fila['ciudad_nom'].",".$fila['pais_nom']);
		fputs($archivo,chr(13).chr(10));
	}	
?>

<html> 
<head> 
<title>Redirigir al navegador a otra URL</title> 
<META HTTP-EQUIV="REFRESH" CONTENT="10;URL=../../index.hmtl"> 
</head> 
<body> 
<script type="text/javascript">
	javascript:history.back(1);
</script>
</body> 
</html>