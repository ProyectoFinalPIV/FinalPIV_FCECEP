<?php
    require_once("../modeloAbstractoDB.php");
	
    class ciudades extends ModeloAbstractoDB {
		public $ciudad_id;
		public $ciudad_nom;
		public $pais_id;
		
		function __construct() {
			//$this->db_name = '';
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
			SELECT ciudad_id, ciudad_nom, m.pais_nom
			FROM tb_ciudad as c inner join tb_pais as m
			ON (c.pais_id = m.pais_id)
			";
			/*$this->query = "
			SELECT comu_codi, comu_nomb, muni_codi
			FROM tb_comuna as c 
			";*/
			$this->obtener_resultados_query();
			return $this->rows;
		}
		public function listaCiudades() {
			$this->query = "
			SELECT ciudad_id, ciudad_nom
			FROM tb_ciudad order by ciudad_nom
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
					foreach ($datos as $campo=>$valor):
						$$campo = $valor;
					endforeach;
					$this->query = "
					INSERT INTO tb_ciudad
					(ciudad_id, ciudad_nom, pais_id)
					VALUES
					(NULL, '$ciudad_nom', '$pais_id')
					";
					$this->ejecutar_query_simple();
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_ciudad
			SET ciudad_nom='$ciudad_nom',
			pais_id='$pais_id'
			WHERE ciudad_id = '$ciudad_id'
			";
			$this->ejecutar_query_simple();
		}
		
		public function borrar($ciudad_id='') {
			$this->query = "
			DELETE FROM tb_ciudad
			WHERE ciudad_id = '$ciudad_id'
			";
			$this->ejecutar_query_simple();
		}
		
		/*function __destruct() {
			unset($this);
		}*/
	}
?>