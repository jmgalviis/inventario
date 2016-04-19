<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->model('empresa/Empresa_model');
		}

		function index(){
			$this->load->view('header');
			$this->load->view('empresa/crearempresa');
			$this->load->view('footer');
		}
		function validarFormulario(){
			echo $this->input->post();
			$this->form_validation->set_rules('nit','Nit','required|xss_clean');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');
			$this->form_validation->set_rules('direccion', 'Dirección', 'required|xss_clean');
			$this->form_validation->set_rules('telefono', 'Teléfono', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
			$this->form_validation->set_message('required','El %s es obligatorio');

			if ($this->form_validation->run() == FALSE) {
				return FALSE;
			} else {
				return TRUE;
			}
		}
		function addEmpresa(){
			
			//
			$this->input->post();

			$this->form_validation->set_rules('nit','Nit','required|xss_clean');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');
			$this->form_validation->set_rules('direccion', 'Dirección', 'required|xss_clean');
			$this->form_validation->set_rules('telefono', 'Teléfono', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
			$this->form_validation->set_message('required','El %s es obligatorio');
			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('header');
				$this->load->view('empresa/crearempresa');
				$this->load->view('footer');
			} else {
				$form_data = array('nit_empresa' => set_value('nit'),
								   'nom_empresa' => set_value('nombre'),
								   'telefono' => set_value('telefono'),
								   'direccion' => set_value('direccion'),
								   'email' => set_value('email')
				 			);
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