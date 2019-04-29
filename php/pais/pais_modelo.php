<?php
    require_once("../modeloAbstractoDB.php");
    class Pais extends ModeloAbstractoDB {
		private $pais_id;
		private $pais_nom;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getPais_id(){
			return $this->pais_id;
		}

		public function getPais_nom(){
			return $this->pais_nom;
		}
		
		public function consultar($pais_id='') {
			if($pais_id !=''):
				$this->query = "
				SELECT pais_id, pais_nom
				FROM tb_pais
				WHERE pais_id = '$pais_id' order by pais_id
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
			SELECT pais_id, pais_nom
			FROM tb_pais 
			order by pais_id
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('pais_id', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$pais_nom= utf8_decode($pais_nom);
				$this->query = "
					INSERT INTO tb_pais
					(pais_id, pais_nom)
					VALUES
					(NULL,'$pais_nom')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$pais_nom= utf8_decode($pais_nom);
			$this->query = "
			UPDATE tb_pais
			SET pais_nom='$pais_nom'
			WHERE pais_id = '$pais_id'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($pais_id='') {
			$this->query = "
			DELETE FROM tb_pais
			WHERE pais_id = '$pais_id'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>