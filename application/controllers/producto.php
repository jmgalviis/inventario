<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('producto/producto_model');
		}

		function index(){
			$data['tipo'] = $this->producto_model->getTipoProducto();
			$this->load->view('header');
			$this->load->view('productos/crearproducto',$data);
			$this->load->view('footer');
		}
		function addProducto(){
			$this->input->post();
			$this->form_validation->set_rules('producto', 'Producto', 'required|xss_clean');
			$this->form_validation->set_message('required','El %s es obligatorio');
			if ($this->form_validation->run() == FALSE) {
				$data['tipo'] = $this->producto_model->getTipoProducto();
				$this->load->view('header');
				$this->load->view('productos/crearproducto',$data);
				$this->load->view('footer');
			} else {
				$form_data = array('cod_producto' => set_value('codigo'));
				if ($this->Empresa_model->saveDatos($form_data) == TRUE) {
					echo "guardo";
					$this->load->view('header');
					$this->load->view('empresa/crearempresa');
					$this->load->view('footer');
				} else {
					echo "no guardo";
				}
				
			}

		}
}
?>