<?php
    require_once("../modeloAbstractoDB.php");
    class Cliente extends ModeloAbstractoDB {
		private $cliente_codi;
		private $cliente_cedula;
		private $docu_codi;
		private $gene_codi;
		private $cliente_nomb;
		private $cliente_apel;
		private $cliente_apel2;
		private $cliente_fec_nac;
		private $cliente_tel;
		private $cliente_cel;
		private $cliente_dir;
		private $ciudad_id;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getCliente_codi(){
			return $this->cliente_codi;
		}

		public function getCliente_cedula(){
			return $this->cliente_cedula;
		}

		public function getDocu_codi(){
			return $this->docu_codi;
		}

		public function getGene_codi(){
			return $this->gene_codi;
		}

		public function getCliente_nomb(){
			return $this->cliente_nomb;
		}

		public function getCliente_apel(){
			return $this->cliente_apel;
		}

		public function getCliente_apel2(){
			return $this->cliente_apel2;
		}

		public function getCliente_fec_nac(){
			return $this->cliente_fec_nac;
		}

		public function getCliente_tel(){
			return $this->cliente_tel;
		}

		public function getCliente_cel(){
			return $this->cliente_cel;
		}

		public function getCliente_dir(){
			return $this->cliente_dir;
		}
		
		public function getCiudad_id(){
			return $this->ciudad_id;
		}

		public function consultar($cliente_codi='') {
			if($cliente_codi !=''):
				$this->query = "
				SELECT cliente_codi, cliente_cedula, docu_codi, gene_codi, cliente_nomb, cliente_apel, cliente_apel2, cliente_tel, cliente_cel, cliente_dir, ciudad_id
				FROM tb_cliente
				WHERE cliente_codi = '$cliente_codi' order by cliente_codi
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		} //Validado comando
		
		public function lista() {
			$this->query = "
			SELECT cliente_codi, cliente_cedula, docu.docu_nomb, gene.gene_nomb, cliente_nomb, cliente_apel, cliente_apel2, cliente_tel, cliente_cel, cliente_dir, ciudad.ciudad_nom
			FROM tb_cliente as cliente inner join tb_ciudad as ciudad
			ON (cliente.ciudad_id = ciudad.ciudad_id) inner join tb_tipo_documento as docu
			ON (cliente.docu_codi = docu.docu_codi) inner join tb_genero as gene
			ON (cliente.gene_codi = gene.gene_codi) order by cliente_codi";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		} //Validado comando
		
		public function nuevo($datos=array()) {
			if(array_key_exists('cliente_codi', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$cliente_cedula= ($cliente_cedula);
				$cliente_nomb= utf8_decode($cliente_nomb);
				$cliente_apel= utf8_decode($cliente_apel);
				$cliente_apel2= utf8_decode($cliente_apel2);
				$cliente_fec_nac = ($cliente_fec_nac)
				$cliente_tel= ($cliente_tel);
				$cliente_cel= ($cliente_cel);
				$cliente_dir= ($cliente_dir);
				$this->query = "
					INSERT INTO tb_cliente
					(cliente_codi, cliente_cedula, docu_codi, gene_codi, cliente_nomb, cliente_apel, cliente_apel2, cliente_fec_nac, cliente_tel, cliente_cel, cliente_dir, ciudad_id)
					VALUES
					(NULL, '$cliente_cedula', '$docu_codi', '$gene_codi', '$cliente_nomb', '$cliente_apel', '$cliente_apel2', '$cliente_fec_nac', '$cliente_tel', '$cliente_cel', '$cliente_dir', '$ciudad_id')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		} //Validado comando
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$cliente_cedula= ($cliente_cedula);
			$docu_nomb= utf8_decode($docu_nomb);
				$gene_nomb= utf8_decode($gene_nomb);
				$cliente_nomb= utf8_decode($cliente_nomb);
				$cliente_apel= utf8_decode($cliente_apel);
				$cliente_apel2= utf8_decode($cliente_apel2);
				$cliente_fec_nac= ($cliente_fec_nac);
				$cliente_tel= ($cliente_tel);
				$cliente_cel= ($cliente_cel);
				$cliente_dir= ($cliente_dir);
			$this->query = " 
			UPDATE tb_cliente
			SET  cliente_cedula='$cliente_cedula',
			docu_codi='$docu_codi',
			gene_codi='$gene_codi',
			cliente_nomb='$cliente_nomb',
			cliente_apel='$cliente_apel',
			cliente_apel2='$cliente_apel2',
			cliente_fec_nac='$cliente_fec_nac',
			cliente_tel='$cliente_tel',
			cliente_cel='$cliente_cel',
			cliente_dir='$cliente_dir',
			ciudad_id='$ciudad_id'
			WHERE cliente_codi = '$cliente_codi'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		} //Validado comando
		
		public function borrar($cliente_codi='') {
			$this->query = "
			DELETE FROM tb_cliente
			WHERE cliente_codi = '$cliente_codi'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		} //Validado comando
		
		function __destruct() {
			//unset($this);
		}
	}
?>