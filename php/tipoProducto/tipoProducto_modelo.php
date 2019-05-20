<?php
    require_once("../modeloAbstractoDB.php");
    class TipoProducto extends ModeloAbstractoDB {
		private $tipo_prod_codi;
		private $tipo_prod_nomb;
		private $tipo_prod_desc;
				
		function __construct() {
			//$this->db_name = '';
		}

		public function getTipo_prod_codi()
		{
				return $this->tipo_prod_codi;
		}
 
		public function getTipo_prod_nomb()
		{
				return $this->tipo_prod_nomb;
		}
 
		public function getTipo_prod_desc()
		{
				return $this->tipo_prod_desc;
		}
 
		public function consultar($prod_codi='') {
			if($prod_codi !=''):
				$this->query = "
				SELECT *
				FROM tb_tipo_producto
				WHERE tipo_prod_codi = '$tipo_prod_codi' order by tipo_prod_codi
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function lista() {
			$this->query = "
			SELECT tipo_prod_codi, tipo_prod_nomb, tipo_prod_desc
			FROM tb_tipo_producto as p order by tipo_prod_codi
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('produ_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$$Nom_Prod= utf8_decode($Nom_Prod);
				$this->query = "
					INSERT INTO tb_producto
					(produ_codi, produ_nomb, produ_precio, produ_stock, Prove_codi, tipo_prod_codi)
					VALUES
					(NULL,'$produ_nomb', '$produ_precio','$produ_stock','$Prove_codi','$tipo_prod_codi')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$Nom_Prod= utf8_decode($Nom_Prod);
			$this->query = "
			UPDATE tb_producto
			SET produ='$produ',
			produ_precio='$produ_precio',
			produ_stock='$produ_stock',
			Prove_codi='$Prove_codi',
			tipo_prod_codi='$tipo_prod_codi'
			WHERE produ_codi = '$produ_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($produ_codi='') {
			$this->query = "
			DELETE FROM productos
			WHERE produ_codi = '$produ_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}

	}
?>