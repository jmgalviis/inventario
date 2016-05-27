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
			$this->input->post();
			$form_data = array('producto_id' => set_value('id'),
								   'orden_id' => set_value('orden'),
								   'cantidad' => set_value('cantidad'));
				if ($this->orden_model->guarda($form_data) == TRUE) {
					echo "guardo";					
				} else {
					echo "no guardo";
				}
		}

		function updateOrden (){

		}

		function deleteOrden (){
			
		}

		function temporal (){
			$data = $this->orden_model->getTmpproducto();
			echo json_encode($data);
		}

		function savetmp(){
			$this->input->post();
			$form_data = array('id_producto' => set_value('id'),
								   'cod_producto' => set_value('codigo'),
								   'nom_producto' => set_value('nombre'),								   
								   'cantidad' => set_value('cantidad'),
								   'id_orden' => set_value('idprov'),);
				if ($this->orden_model->guardaTmp($form_data) == TRUE) {
					echo "guardo";					
				} else {
					echo "no guardo";
				}
		}

		function tmpelimina(){

			$ideliminar = $this->input->post("id");
				if ($this->orden_model->tmpdelete($ideliminar) == TRUE) {
					echo "Producto eliminado";
				} else {
					echo "Primero debe eliminar el producto del inventario";
				}

			if ($this->input->is_ajax_request()) {
				
			} else { echo "es falso";}
		}
	}
?>