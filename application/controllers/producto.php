<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
		function __construct(){
			parent::__construct();
		}

		function index(){
			$this->load->view('header');
			$this->load->view('productos/crearproducto');
			$this->load->view('footer');
		}
}
?>