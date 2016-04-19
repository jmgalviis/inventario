<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {
		function __construct(){
			parent::__construct();
		}

		function index(){
			$this->load->view('header');
			$this->load->view('servicios/crearservicio');
			$this->load->view('footer');
		}
}
?>