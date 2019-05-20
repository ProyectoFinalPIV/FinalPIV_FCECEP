<?php
	require_once('../modeloAbstractoDB.php');
	class Documento extends ModeloAbstractoDB {
		public $docu_codi;
		public $docu_nomb;
		public $depa_codi;
		
		function __construct() {
			//$this->db_name = '';
		}
		
		public function getDocu_codi(){
			return $this->docu_codi;
		}

		public function getDocu_nomb(){
			return $this->docu_nomb;
		}
		
		public function consultar($docu_codi='') {
			if($docu_codi != ''):
				$this->query = "
				SELECT *
				FROM tb_tipo_documento
				WHERE docu_codi = '$docu_codi' ORDER BY docu_codi;
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
			SELECT docu_codi, docu_nomb
			FROM tb_tipo_documento as d
			ORDER BY d.docu_nomb;
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function listaTipoDocumento() {
			$this->query = "
			SELECT *
			FROM tb_tipo_documento as d order by d.docu_nomb;
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		

		public function nuevo($datos=array()) {
			if(array_key_exists('ciudad_id', $datos)):
				//$datos = utf8_string_array_encode($datos);
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$ciudad_nom = utf8_decode($ciudad_nom);
				$this->query = "
				INSERT INTO tb_ciudad
				(ciudad_id, ciudad_nom, depa_codi)
				VALUES
				('$ciudad_id','$ciudad_nom','$depa_codi')
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
			SET ciudad_nom ='$ciudad_nom',
			depa_codi='$depa_codi'
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
	}
?>