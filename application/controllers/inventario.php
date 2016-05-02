<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('inventario/inventario_model');
		}

		function index(){
			$data['inv'] = $this->inventario_model->getInventario();
			$this->load->view('header');
			$this->load->view('inventario/principal',$data);
			$this->load->view('footer');
		}
}
?>