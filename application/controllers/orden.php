<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orden extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('orden/orden_model');
			
		}

		function index (){
			$this->load->view('header');
			$this->load->view('orden/principal');
			$this->load->view('footer');
		}

		function listarOrden (){

		}

		function crearOrden (){
			$data['proveedor'] = $this->orden_model->getProveedor();
			$this->load->view('header');
			$this->load->view('orden/crearorden', $data);
			$this->load->view('footer');
		}

		function addOrden (){

		}

		function updateOrden (){

		}

		function deleteOrden (){
			
		}

		function temporal (){
			$data = $this->orden_model->getTmpproducto();
			echo json_decode($data);
		}
	}
?>