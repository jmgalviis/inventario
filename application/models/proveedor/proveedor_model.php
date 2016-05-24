<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor_model extends CI_Model {
		function __construct(){
			parent::__construct();
		}

		function saveProveedor($form_data){
			$this->db->insert('proveedor',$form_data);
			if ($this->db->affected_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		function likeProveedor($texto) {
			$this->db->like('nom_proveedor',$texto);
			$retorna = $this->db->get('proveedor');
			return $retorna->result();
		}

		function updateProveedor($id,$data){
			$this->db->where('id_proveedor',$id);
			$this->db->update('proveedor',$data);
			if ($this->db->affected_rows () > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		function deleteProveedor($id){

				$this->db->where('id_proveedor', $id);
				$this->db->delete('proveedor');
				if ($this->db->affected_rows() > 0) {
					return TRUE;
				} else {
					return FALSE;
				}			
		}
}
	?>