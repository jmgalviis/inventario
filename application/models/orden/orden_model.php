<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orden_model extends CI_Model {
		function __construct(){
			parent::__construct();
		}

		function guardarorden ($form_data){
			$tmp = $this->db->get(tmp_producto)->result;
			foreach ($tmp as $key) {
				# code...
			}
		}

		function likeOrden ($texto){
			$this->db->like('',$texto);
			$retorna = $this->db->get('producto');
			return $retorna->result();
		}

		function getEstado (){
			$estado = $this->db->get('est_orden');
			return $estado->result();
		}

		function getProveedor (){
			$retorne = $this->db->get('proveedor');
			return $retorne->result();
		}


		function getTmpproducto (){
			$retorne = $this->db->get('tmp_producto');
			return $retorne->result();
		}

		function guardaTmp ($form_data){
			$this->db->insert('tmp_producto',$form_data);
			if ($this->db->affected_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

		function tmpdelete ($id){
			$this->db->where('id_producto', $id);
				$this->db->delete('tmp_producto');
				if ($this->db->affected_rows() > 0) {
					return TRUE;
				} else {
					return FALSE;
				}	
		}
	}
?>