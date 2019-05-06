<?php
    require_once("../modeloAbstractoDB.php");
    class Genero extends ModeloAbstractoDB {
		private $gene_codi;
		private $gene_nomb;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getGene_codi(){
			return $this->gene_codi;
		}

		public function getGene_nomb(){
			return $this->gene_nomb;
		}

		public function consultar($gene_codi='') {
			if($gene_codi !=''):
				$this->query = "
				SELECT gene_codi, gene_nomb
				FROM tb_genero
				WHERE gene_codi = '$gene_codi' order by gene_codi
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
			SELECT gene_codi, gene_nomb
			FROM tb_genero  order by gene_codi
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('gene_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$gene_nomb= utf8_decode($gene_nomb);
				$this->query = "
					INSERT INTO tb_genero
					(gene_codi, gene_nomb)
					VALUES
					(NULL, '$gene_nomb')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$gene_nomb= utf8_decode($gene_nomb);
			$this->query = "
			UPDATE tb_genero
			SET gene_nomb='$gene_nomb'
			WHERE gene_codi = '$gene_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($gene_codi='') {
			$this->query = "
			DELETE FROM tb_genero
			WHERE gene_codi = '$gene_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}    // codigo listo, falta validar
?>