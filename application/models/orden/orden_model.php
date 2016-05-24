<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orden_model extends CI_Model {
		function __construct(){
			parent::__construct();
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
	}
?>