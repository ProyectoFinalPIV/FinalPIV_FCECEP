<?php
    require_once("../modeloAbstractoDB.php");
    class Proveedor extends ModeloAbstractoDB {
		private $prove_codi;
		private $docu_codi;
		private $docu_nomb;
		private $prove_cedula;
		private $prove_nomb_comer;
		private $prove_dir;
		private $ciudad_id;
		private $prove_tel;
		private $prove_repre;
				
		function __construct() {
			//$this->db_name = '';
		}

		public function getProve_codi()
		{
				return $this->prove_codi;
		}
 
		public function getDocu_codi()
		{
				return $this->docu_codi;
		}
		public function getDocu_nomb()
		{
				return $this->docu_nomb;
		}
 
		public function getProve_cedula()
		{
				return $this->prove_cedula;
		}
 
		public function getProve_nomb_comer()
		{
				return $this->prove_nomb_comer;
		}

		public function getProve_dir()
		{
				return $this->prove_dir;
		}

		public function getCiudad_id()
		{
				return $this->ciudad_id;
		}

		public function getCiudad_nom()
		{
				return $this->ciudad_nom;
		}
	
		public function getProve_tel()
		{
				return $this->prove_tel;
		}

		public function getProve_repre()
		{
				return $this->prove_repre;
		}

		public function consultar($prove_codi='') {
			if($prove_codi !=''):
				$this->query = "
				SELECT *
				FROM tb_proveedor
				WHERE prove_codi = '$prove_codi' order by prove_codi
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
					SELECT prove_codi, p.docu_codi, d.docu_nomb, prove_nomb_comer, prove_cedula, prove_dir,
								p.ciudad_id, c.ciudad_nom, prove_tel, prove_repre  
								FROM tb_proveedor as p 
								INNER JOIN tb_tipo_documento as d ON (p.docu_codi = d.docu_codi) 
								INNER JOIN tb_ciudad as c ON (p.ciudad_id = c.ciudad_id)
								ORDER BY prove_codi 
			";
		$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('prove_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$prove_nomb_comer= utf8_decode($prove_nomb_comer);
				$prove_dir= utf8_decode($prove_dir);
				$prove_repre= utf8_decode($prove_repre);
				$this->query = "
					INSERT INTO tb_proveedor
					(prove_codi, docu_codi, prove_cedula, prove_nomb_comer, prove_dir, ciudad_id, prove_tel, prove_repre)
					VALUES ('$prove_codi','$docu_codi','$prove_cedula','$prove_nomb_comer','$prove_dir','$ciudad_id','$prove_tel','$prove_repre')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
				$prove_nomb_comer= utf8_decode($prove_nomb_comer);
				$prove_dir= utf8_decode($prove_dir);
				$prove_repre= utf8_decode($prove_repre);
			$this->query = "
			UPDATE tb_proveedor
			SET docu_codi='$docu_codi',
			prove_cedula='$prove_cedula',
			prove_nomb_comer='$prove_nomb_comer',
			prove_dir='$prove_dir',
			ciudad_id='$ciudad_id',
			prove_dir='$prove_tel',
			prove_repre='$prove_repre'
			WHERE prove_codi = '$prove_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($prove_codi='') {
			$this->query = "
			DELETE FROM tb_proveedor
			WHERE prove_codi = '$prove_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}

	}
?>