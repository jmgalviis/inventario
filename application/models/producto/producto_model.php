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
		function getProducto(){
			$tipo= $this->db->get('producto');
			if ($tipo->num_rows() > 0) {
				return $tipo->result();
			}
		}

		function updateProducto($id,$data){
			$this->db->where('id_producto',$id);
			$this->db->update('producto',$data);
			if ($this->db->affected_rows () > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
}

?>