<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this->load->model('producto/producto_model');
		}

		function index(){
			$data['prod'] = $this->producto_model->getProducto();
			$data['tipo'] = $this->producto_model->getTipoProducto();
			$this->load->view('header');
			$this->load->view('productos/principal',$data);
			$this->load->view('footer');
			/*$data['tipo'] = $this->producto_model->getTipoProducto();
			$this->load->view('header');
			$this->load->view('productos/crearproducto',$data);
			$this->load->view('footer');*/
		}

		function vistaAgregar(){
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
				$this->index();
				/*$data['tipo'] = $this->producto_model->getTipoProducto();
				$this->load->view('header');
				$this->load->view('productos/crearproducto',$data);
				$this->load->view('footer');*/
			} else {
				$form_data = array('cod_producto' => set_value('codigo'),
								   'nom_producto' => set_value('producto'),
								   'des_producto' => set_value('descripcion'),
								   'tipo_producto' => set_value('tipo'));

				if ($this->producto_model->saveProducto($form_data) == TRUE) {
					echo $this->index();
					
				} else {
					echo "no guardo";
				}
				
			}

		}

		function updateProducto(){
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
				$id = $this->input->post("idproducto");
				$codigo = $this->input->post("codigo");
				$producto = $this->input->post("producto");
				$descripcion = $this->input->post("descripcion");
				$tipo = $this->input->post("tipo");
				$form_data = array('cod_producto' => $codigo,
								   'nom_producto' => $producto,
								   'des_producto' => $descripcion,
								   'tipo_producto' => $tipo);

				if ($this->producto_model->updateProducto($id,$form_data) == TRUE) {
					echo "El producto se actualizo correctamente";
					$data['tipo'] = $this->producto_model->getTipoProducto();
					$this->load->view('header');
					$this->load->view('productos/principal',$data);
					$this->load->view('footer');
					
				} else {
					$data['prod'] = $this->producto_model->getProducto();
					
				}
				
			}

		}
		function deleteProducto(){

			if ($this->input->is_ajax_request()) {
				$ideliminar = $this->input->post("id");
				if ($this->producto_model->deletproducto($ideliminar) == TRUE) {
					echo "Producto eliminado";
				} else {
					echo "Primero debe eliminar el producto del inventario";
				}
			} else { echo "es falso";}
		}

		function listarProductos(){
			if ($this->input->is_ajax_request()) {
				$buscar = $this->input->post('buscar');
			$datos = $this->producto_model->likeProducto($buscar);
			echo json_encode($datos);
			} 
		}
}
?>