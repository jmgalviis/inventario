<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
		function __construct(){
			parent::__construct();
		}

		function index(){
			$this->load->view('header');
			$this->load->view('clientes/crearcliente');
			$this->load->view('footer');
		}
}
?>