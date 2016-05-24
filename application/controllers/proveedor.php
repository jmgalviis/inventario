<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('proveedor/proveedor_model');
		}

		function index(){
			$this->load->view('header');
			$this->load->view('proveedores/principal');
			$this->load->view('footer');
		}

		function vistaCrear(){
			$this->load->view('header');
			$this->load->view('proveedores/crearproveedores');
			$this->load->view('footer');
		}

		function addProveedor(){
			$this->input->post();
			$this->form_validation->set_rules('nit', 'Nit', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre de la Empresa', 'required');
			$this->form_validation->set_rules('direccion', 'Dirección', 'required');
			$this->form_validation->set_rules('telefono', 'Teléfono', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('nombrecontacto', 'Nombre del Contacto', 'required');
			$this->form_validation->set_rules('telefonocontacto', 'Teléfono del Contacto', 'required');
			$this->form_validation->set_message('required','El campo %s es obligatorio');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$form_data = array('nit_proveedor' => set_value('nit'),
								   'nom_proveedor' => set_value('nombre'),
								   'dir_proveedor' => set_value('direccion'),
								   'tel_proveedor' => set_value('telefono'),
								   'email_proveedor' => set_value('email'),
								   'nom_contacto' => set_value('nombrecontacto'),
								   'tel_contacto' => set_value('telefonocontacto'));

				if ($this->proveedor_model->saveProveedor($form_data) == TRUE) {
					echo $this->index();
					
				} else {
					echo "no guardo";
				}
				
			}
		}

		function listarProveedor(){
			if ($this->input->is_ajax_request()) {
				$buscar = $this->input->post('buscar');
			$datos = $this->proveedor_model->likeProveedor($buscar);
			echo json_encode($datos);
			} 
		}

		function updateProveedor(){
			$this->input->post();
			$this->form_validation->set_rules('nit', 'Nit', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre de la Empresa', 'required');
			$this->form_validation->set_rules('direccion', 'Dirección', 'required');
			$this->form_validation->set_rules('telefono', 'Teléfono', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('nombrecontacto', 'Nombre del Contacto', 'required');
			$this->form_validation->set_rules('telefonocontacto', 'Teléfono del Contacto', 'required');
			$this->form_validation->set_message('required','El campo %s es obligatorio');
			if ($this->form_validation->run() == FALSE) {
				echo "No paso nada";
				/*$data['tipo'] = $this->producto_model->getTipoProducto();
				$this->load->view('header');
				$this->load->view('productos/crearproducto',$data);
				$this->load->view('footer');*/
			} else {
				$id = $this->input->post("idproveedor");
				$nit = $this->input->post("nit");
				$nombre = $this->input->post("nombre");
				$direccion = $this->input->post("direccion");
				$telefono = $this->input->post("telefono");
				$email = $this->input->post("email");
				$nombrecontacto = $this->input->post("nombrecontacto");
				$telefonocontacto = $this->input->post("telefonocontacto");
				$form_data = array('nit_proveedor' => $nit,
								   'nom_proveedor' => $nombre,
								   'dir_proveedor' => $direccion,
								   'tel_proveedor' => $telefono,
								   'email_proveedor' => $email,
								   'nom_contacto' => $nombrecontacto,
								   'tel_contacto' => $telefonocontacto);

				if ($this->proveedor_model->updateProveedor($id,$form_data) == TRUE) {
					echo "El proveedor se actualizo correctamente";
					$this->load->view('header');
					$this->load->view('proveedores/principal');
					$this->load->view('footer');
				} else {
					echo "El proveedor no se actualizo";
					//$data['prod'] = $this->producto_model->getProducto();
					
				}
				
			}

		}
		function deleteProveedor(){

			if ($this->input->is_ajax_request()) {
				$ideliminar = $this->input->post("id");
				if ($this->proveedor_model->deleteProveedor($ideliminar) == TRUE) {
					echo "Producto eliminado";
				} else {
					echo "Primero debe eliminar el producto del inventario";
				}
			} else { echo "es falso";}
		}
		
}
?>