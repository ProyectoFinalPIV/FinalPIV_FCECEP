<?php
    require_once("../modeloAbstractoDB.php");
    class Farmacia extends ModeloAbstractoDB {
		private $farma_codi;
		private $farma_nomb;
		private $farma_dir;
		private $ciudad_id;
		private $farma_tel;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getFarma_codi(){
			return $this->farma_codi;
		}

		public function getFarma_nomb(){
			return $this->farma_nomb;
		}

		public function getFarma_dir(){
			return $this->farma_dir;
		}

		public function getCiudad_id(){
			return $this->ciudad_id;
		}

		public function getFarma_tel(){
			return $this->farma_tel;
		}
		
		public function consultar($farma_codi='') {
			if($farma_codi !=''):
				$this->query = "
				SELECT farma_codi, farma_nomb, farma_dir, ciudad_id, farma_tel
				FROM tb_farmacia
				WHERE farma_codi = '$farma_codi' order by farma_codi
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
			SELECT farma_codi, farma_nomb, farma_dir, c.ciudad_nom, farma_tel
			FROM tb_farmacia as f inner join tb_ciudad as c
			ON (f.ciudad_id = c.ciudad_id) order by farma_codi
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('farma_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$farma_nomb= utf8_decode($farma_nomb);
				$this->query = "
					INSERT INTO tb_farmacia
					(farma_codi, farma_nomb, farma_dir, ciudad_id, farma_tel)
					VALUES
					(NULL, '$farma_nomb', '$farma_dir', '$ciudad_id', '$farma_tel')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$farma_nomb= utf8_decode($farma_nomb);
			$farma_dir= ($farma_dir);
			$farma_tel= ($farma_tel);
			$this->query = "
			UPDATE tb_farmacia
			SET farma_nomb='$farma_nomb', farma_dir='$farma_dir', farma_tel='$farma_tel',
			ciudad_id='$ciudad_id'
			WHERE farma_codi = '$farma_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($farma_codi='') {
			$this->query = "
			DELETE FROM tb_farmacia
			WHERE farma_codi = '$farma_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>