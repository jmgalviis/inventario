<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->library('ion_auth');
		}

		function index(){
			if (!$this->ion_auth->logged_in()){
				redirect('auth/login', 'refresh');
			}else{
			$this->load->view('header');
			$this->load->view('inicio');
			$this->load->view('footer');
		};
		}
}
?>