<?php
    require_once("../modeloAbstractoDB.php");
    class Ciudad extends ModeloAbstractoDB {
		private $ciudad_id;
		private $ciudad_nom;
		private $pais_id;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getCiudad_id(){
			return $this->ciudad_id;
		}

		public function getCiudad_nom(){
			return $this->ciudad_nom;
		}
		
		public function getPais_id(){
			return $this->pais_id;
		}

		public function consultar($ciudad_id='') {
			if($ciudad_id !=''):
				$this->query = "
				SELECT ciudad_id, ciudad_nom, pais_id
				FROM tb_ciudad
				WHERE ciudad_id = '$ciudad_id' order by ciudad_id
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
			SELECT ciudad_id, ciudad_nom, p.pais_nom
			FROM tb_ciudad as c inner join tb_pais as p
			ON (c.pais_id = p.pais_id) order by ciudad_id
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('ciudad_id', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$ciudad_nom= utf8_decode($ciudad_nom);
				$this->query = "
					INSERT INTO tb_ciudad
					(ciudad_id, ciudad_nom, pais_id)
					VALUES
					(NULL, '$ciudad_nom', '$pais_id')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$ciudad_nom= utf8_decode($ciudad_nom);
			$this->query = "
			UPDATE tb_ciudad
			SET ciudad_nom='$ciudad_nom',
			pais_id='$pais_id'
			WHERE ciudad_id = '$ciudad_id'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($ciudad_id='') {
			$this->query = "
			DELETE FROM tb_ciudad
			WHERE ciudad_id = '$ciudad_id'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	} //<!-- codigo listo, funcionando -->
?>