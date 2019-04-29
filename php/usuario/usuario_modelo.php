<?php /*Editado Completo 12-02-19 */
    require_once("../modeloAbstractoDB.php");
    class Usuario extends ModeloAbstractoDB {
		 $id_Usuario = ['id_Usuario'];
		 $nom_Usuario = ['nom_Usuario'];
         $pass_Usuario = ['pass_Usuario'];
         $mail_Usuario = ['mail_Usuario'];
        /*private $cedula_Client;
        private $cedula_Emp;
        private $id_Rol; 
        private $status_Rol;*/ //Se eliminaron de la BD
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getId_Usuario(){
			return $this->id_Usuario;
		}

		public function getNom_Usuario(){
			return $this->nom_Usuario;
		}
		
		public function getPass_Usuario(){
			return $this->pass_Usuario;
        }
        
        public function getMail_Usuario(){
			return $this->mail_Usuario;
        }
        
        public function getCedula_Client(){
			return $this->cedula_Cliente;
        }
        
        public function getCedula_Emp(){
			return $this->cedula_Emp;
        }
        
        public function getId_Rol(){
			return $this->id_Rol;
        }
        
        public function getStatus_Rol(){
			return $this->status_Rol;
		}

		public function consultar($id_Usuario='') {
			if($id_Usuario !=''):
				$this->query = "
				SELECT id_Usuario, nom_Usuario, pass_Usuario, mail_Usuario
				FROM usuariosys
				WHERE id_Usuario = '$id_Usuario' order by id_Usuario
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function lista() { /*c=cliente, e=empleado, r=rol, u=usuario */
			$this->query = "
            SELECT u.id_Usuario, u.nom_Usuario, u.pass_Usuario, u.mail_Usuario, c.cedula_Client,e.cedula_Emp, r.id_Rol, u.status_Rol 
            FROM usuariosys as u inner join cliente as c 
            ON (u.cedula_Client = c.tipo_Client) 
            inner join empleados as e 
            ON (u.cedula_Emp = e.cargo_Emp) 
            inner join rol_usuario as r 
            ON (u.id_Rol = r.nom_Rol) 
            order by id_Usuario
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_Usuario', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nom_Usuario= utf8_decode($nom_Usuario);
				$this->query = "
					INSERT INTO usuariosys
					(id_Usuario, nom_Usuario, pass_Usuario, mail_Usuario)
					VALUES
					(id_Usuario, 'nom_Usuario', 'pass_Usuario', 'mail_Usuario')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nom_Usuario= utf8_decode($nom_Usuario);
			$this->query = "
			UPDATE usuariosys
			SET nom_Usuario='$nom_Usuario',
			pass_Usuario='$pass_Usuario',
			mail_Usuario='$mail_Usuario',
			cedula_Client='$cedula_Client',
			cedula_Emp='$cedula_Emp',
			id_Rol='$id_Rol',
			status_Rol='$status_Rol'
			WHERE id_Usuario = '$id_Usuario'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_Usuario='') {
			$this->query = "
			DELETE FROM usuariosys
			WHERE id_Usuario = '$id_Usuario'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>