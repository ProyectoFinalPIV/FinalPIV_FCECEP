<?php
	require_once('../modeloAbstractoDB.php');
	class Departamento extends ModeloAbstractoDB {
		public $depa_codi;
		public $depa_nomb;
		public $pais_id;
		
		function __construct() {
			//$this->db_name = '';
		}
		
		public function getDepa_codi(){
			return $this->depa_codi;
		}

		public function getDepa_nomb(){
			return $this->depa_nomb;
		}
		
		public function getPais_id(){
			return $this->pais_id;
		}

		public function consultar($depa_codi='') {
			if($depa_codi != ''):
				$this->query = "
				SELECT depa_codi, depa_nomb, pais_id
				FROM tb_departamento
				WHERE depa_codi = '$depa_codi'
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
			SELECT depa_codi, depa_nomb, d.pais_id, p.pais_nom
				FROM tb_departamento as d inner join tb_pais as p
				ON (d.pais_id = p.pais_id) ORDER BY d.depa_nomb;
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		public function listadepartamento() {
			$this->query = "
			SELECT depa_codi, depa_nomb, pais_id
			FROM tb_departamento as d order by depa_nomb;
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('depa_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
				INSERT INTO tb_departamento
				(depa_codi, depa_nomb, pais_id)
				VALUES
				('$depa_codi', '$depa_nomb', '$pais_id')
				";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_departamento
			SET depa_nomb='$depa_nomb',
			pais_id='$pais_id'
			WHERE depa_codi = '$depa_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($depa_codi='') {
			$this->query = "
			DELETE FROM tb_departamento
			WHERE depa_codi = '$depa_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>