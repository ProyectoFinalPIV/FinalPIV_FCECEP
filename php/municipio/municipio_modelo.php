<?php
	require_once('../modeloAbstractoDB.php');
	class Municipio extends ModeloAbstractoDB {
		public $muni_codi;
		public $muni_nomb;
		public $depa_codi;
		
		function __construct() {
			//$this->db_name = '';
		}
		
		public function getMuni_codi(){
			return $this->muni_codi;
		}

		public function getMuni_nomb(){
			return $this->muni_nomb;
		}
		
		public function getDepa_codi(){
			return $this->depa_codi;
		}

		public function consultar($muni_codi='') {
			if($muni_codi != ''):
				$this->query = "
				SELECT muni_codi, muni_nomb, depa_codi
				FROM tb_municipio
				WHERE muni_codi = '$muni_codi' ORDER BY muni_codi;
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
			SELECT muni_codi, muni_nomb, m.depa_codi, d.depa_nomb
			FROM tb_municipio as m inner join tb_departamento as d
			ON (m.depa_codi = d.depa_codi) ORDER BY m.muni_nomb;
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function listaMunicipio() {
			$this->query = "
			SELECT muni_codi, muni_nomb, depa_codi
			FROM tb_municipio as m order by muni_nomb
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		

		public function nuevo($datos=array()) {
			if(array_key_exists('muni_codi', $datos)):
				//$datos = utf8_string_array_encode($datos);
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$muni_nomb= utf8_decode($muni_nomb);
				$this->query = "
				INSERT INTO tb_municipio
				(muni_codi, muni_nomb, depa_codi)
				VALUES
				('$muni_codi','$muni_nomb', '$depa_codi')
				";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$muni_nomb= utf8_decode($muni_nomb);
			$this->query = "
			UPDATE tb_municipio
			SET muni_nomb='$muni_nomb',
			depa_codi='$depa_codi'
			WHERE muni_codi = '$muni_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($muni_codi='') {
			$this->query = "
			DELETE FROM tb_municipio
			WHERE muni_codi = '$muni_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>