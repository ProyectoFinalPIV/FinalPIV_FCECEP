<?php
    require_once("../modeloAbstractoDB.php");
    class Documento extends ModeloAbstractoDB {
		private $docu_codi;
		private $docu_nomb;
		
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
			if($docu_codi !=''):
				$this->query = "
				SELECT docu_codi, docu_nomb
				FROM tb_tipo_documento
				WHERE docu_codi = '$docu_codi' order by docu_codi
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
			FROM tb_tipo_documento  order by docu_codi
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('docu_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$docu_nomb= utf8_decode($docu_nomb);
				$this->query = "
					INSERT INTO tb_tipo_documento
					(docu_codi, docu_nomb)
					VALUES
					(NULL, '$docu_nomb')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$docu_nomb= utf8_decode($docu_nomb);
			$this->query = "
			UPDATE tb_tipo_documento
			SET docu_nomb='$docu_nomb'
			WHERE docu_codi = '$docu_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($docu_codi='') {
			$this->query = "
			DELETE FROM tb_tipo_documento
			WHERE docu_codi = '$docu_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}    // codigo listo, funcionando
?>