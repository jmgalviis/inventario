<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario_model extends CI_Model {
		function __construct(){
			parent::__construct();
		}

		function getInventario(){
			$tipo= $this->db->get('vis_inventario');
			if ($tipo->num_rows() > 0) {
				return $tipo->result();
			}
		}
	}
	?>