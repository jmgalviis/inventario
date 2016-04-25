<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {
		function __construct(){
			parent::__construct();
		}

		function getTipoProducto(){
			$tipo= $this->db->get('tipo_producto');
			if ($tipo->num_rows() > 0) {
				return $tipo->result();
			}
		}
		function saveProducto($form_data){
			$this->db->insert('producto',$form_data);
			if ($this->db->affected_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
}

?>