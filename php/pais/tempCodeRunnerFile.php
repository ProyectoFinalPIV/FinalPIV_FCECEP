<?php
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