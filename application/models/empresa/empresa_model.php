<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_Model {
		function __construct(){
			parent::__construct();
		}

		function saveDatos($form_data){
			$this->db->insert('bas_empresa',$form_data);
			if ($this->db->affected_rows() == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
?>