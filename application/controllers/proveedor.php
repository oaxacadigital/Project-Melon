<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
		
	}

	public function index()
	{
	$tipo = $this->input->get('type', TRUE);
		$q = $this->input->get('q', TRUE);
		$this->load->model('Mod_proveedor');
		if ($q != NULL){
			$data_wrap['info'] = $this->Mod_proveedor->buscar($q);
		} else {
			$data_wrap['info'] = $this->Mod_proveedor->lista();
		}	
		$data["frame"] = $this->load->view('proveedor/lista',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
	}
	
	public function nuevo()
	{
		
		//$proveedor['idproveedor']=$this->input->post('idproveedor', TRUE);
		$proveedor['razonsocial']=$this->input->post('razonsocial', TRUE);
		$proveedor['direccion']=$this->input->post('direccion', TRUE);
		$proveedor['telefono']=$this->input->post('telefono', TRUE);
		$proveedor['contacto']=$this->input->post('contacto', TRUE);
		$data_wrap["inser"]="false";
		if($proveedor['razonsocial']){
		$this->load->model('Mod_proveedor');	
		$result = $this->Mod_proveedor->inserta($proveedor);
			if($result>0){
				$data_wrap["inser"]="true";
				}
		
		}
		$data["frame"] = $this->load->view('proveedor/nuevo',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
		
	}

	
	public function consulta($id){
		$this->load->model('Mod_proveedor');
		$data_wrap  = $this->Mod_proveedor->consulta($id);
		$data["frame"]=$this->load->view('proveedor/consulta',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);	
		//print_r($arrayProv);
		
	}
	
	public function actualiza($id){
		$proveedor['idproveedor']=$id;
		//$id = $this->input->post('idarticulo', TRUE);
		$proveedor['razonsocial']=$this->input->post('razonsocial', TRUE);
		$proveedor['direccion']=$this->input->post('direccion', TRUE);
		$proveedor['telefono']=$this->input->post('telefono', TRUE);
		$proveedor['contacto']=$this->input->post('contacto', TRUE);
		
		if($proveedor['razonsocial']){
			$this->load->model('Mod_proveedor');	
			$result = $this->Mod_proveedor->actualiza($id, $proveedor);
			if ($result){
				 redirect('/proveedor/', 'refresh');
			}
		}
		
	}
	
	public function elimina($id){
	if($id)
		{
		$this->load->model('Mod_proveedor');
		$data["proveedor"] = $this->Mod_proveedor->consulta($id);
        $seguro = $this->input->post('seguro', TRUE);
		
			if( $seguro ){
			$this->Mod_proveedor->elimina($id);
			 redirect('proveedor/', 'refresh');
			}else{
					$data['username']	= $this->tank_auth->get_username();
					$this->load->view('proveedor/elimina_proveedor',$data);
					}
		
		}else{
			redirect('/', 'refresh');
			}
	
	}
		
}
?>