<?php
    require_once("../modeloAbstractoDB.php");
    class Producto extends ModeloAbstractoDB {
		private $produ_codi;
		private $produ_nomb;
		private $produ_precio;
		private $produ_stock;
		private $Prove_codi;
		private $tipo_prod_codi;
		private $tipo_prod_nomb;
		private $prove_nomb_comer;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getProdu_codi()
		{
				return $this->produ_codi;
		}
 
		public function getProdu_nomb()
		{
				return $this->produ_nomb;
		}
 
		public function getProdu_precio()
		{
				return $this->produ_precio;
		}
 
		public function getProdu_stock()
		{
				return $this->produ_stock;
		}

		public function getProve_codi()
		{
				return $this->Prove_codi;
		}

		public function getTipo_prod_codi()
		{
				return $this->tipo_prod_codi;
		}
	
		public function getTipo_prod_nomb()
		{
				return $this->tipo_prod_nomb;
		}

		public function getProve_nomb_comer()
		{
				return $this->prove_nomb_comer;
		}

		public function consultar($produ_codi='') {
			if($produ_codi !=''):
				$this->query = "
				SELECT produ_codi, produ_nomb, produ_precio, produ_stock, prove_codi/*, tipo_prod_codi*/
				FROM tb_producto
				WHERE produ_codi = '$produ_codi' order by produ_nomb
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function consultarP($produ_codi='') {
			if($produ_codi !=''):
				$this->query = "
				SELECT produ_codi, produ_nomb, produ_precio, produ_stock, 
								p.Prove_codi, m.prove_nomb_comer, p.tipo_prod_codi, t.tipo_prod_nomb
								FROM tb_producto as p inner join tb_proveedor as m
								ON (p.Prove_codi = m.Prove_codi) 
								inner join tb_tipo_producto as t
								ON (p.tipo_prod_codi = t.tipo_prod_codi)
								WHERE produ_codi = '$produ_codi'
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
			SELECT produ_codi, produ_nomb, produ_precio, produ_stock, 
			p.Prove_codi, m.prove_nomb_comer, p.tipo_prod_codi, t.tipo_prod_nomb
			FROM tb_producto as p 
			inner join tb_proveedor as m ON (p.prove_codi = m.prove_codi) 
			inner join tb_tipo_producto as t ON (p.tipo_prod_codi = t.tipo_prod_codi)
			ORDER BY produ_codi
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
					('$produ_codi','$produ_nomb', '$produ_precio','$produ_stock','$Prove_codi','$tipo_prod_codi')
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
			SET produ_nomb='$produ_nomb',
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
			DELETE FROM tb_productos
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