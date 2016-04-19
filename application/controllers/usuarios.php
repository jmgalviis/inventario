<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->helper('form')
		}

		function index(){
			$this->load->view('header');
			$this->load->view('usuarios/crearusuario');
			$this->load->view('footer');
		}

		function addUsuario(){

		}
}
?>