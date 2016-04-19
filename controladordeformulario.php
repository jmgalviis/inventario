<?php
class Empresa extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('empresa');
	}	
	function index()
	{			
		$this->form_validation->set_rules('nit', 'Nit', 'required|xss_clean');			
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|xss_clean');			
		$this->form_validation->set_rules('direccion', 'Dirección', 'required|xss_clean');			
		$this->form_validation->set_rules('telefono', 'Teléfono', 'required|xss_clean');			
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('crearempresa_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'nit' => set_value('nit'),
					       	'nombre' => set_value('nombre'),
					       	'direccion' => set_value('direccion'),
					       	'telefono' => set_value('telefono'),
					       	'email' => set_value('email')
						);
					
			// run insert model to write data to db
		
			if ($this->empresa->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('empresa/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>