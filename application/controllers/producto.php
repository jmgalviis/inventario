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
			$this->form_validation->set_rules('producto', 'Producto', 'required');
			$this->form_validation->set_rules('codigo', 'Código del Producto', 'is_natural_no_zero');
			$this->form_validation->set_message('required','El %s es obligatorio');
			$this->form_validation->set_message('is_natural_no_zero','El %s Solo números > 0');
			if ($this->form_validation->run() == FALSE) {
				$data['tipo'] = $this->producto_model->getTipoProducto();
				$this->load->view('header');
				$this->load->view('productos/crearproducto',$data);
				$this->load->view('footer');
			} else {
				$form_data = array('cod_producto' => set_value('codigo'),
								   'nom_producto' => set_value('producto'),
								   'des_producto' => set_value('descripcion'),
								   'tipo_producto' => set_value('tipo'));

				if ($this->producto_model->saveProducto($form_data) == TRUE) {
					echo "guardo";
					
				} else {
					echo "no guardo";
				}
				
			}

		}
}
?>