<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Credito extends CI_Controller {

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
	$this->load->model('Mod_credito');	
		$data_wrap['info'] = $this->Mod_credito->lista();
		
		$data["frame"] = $this->load->view('credito/lista',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
	}
	public function nuevo()
	{
		
		//$articulo = array();
		
		//$articulo['idarticulo']=$this->input->post('idarticulo', TRUE);
		$credito['idproveedor']=$this->input->post('proveedor', TRUE);
		$credito['descripcion']=$this->input->post('descripcion', TRUE);
		$credito['cantidad_inicial']=$this->input->post('cantidad_inicial', TRUE);
		$credito['cantidad_actual']=$this->input->post('cantidad_inicial', TRUE);
		$credito['f_iniciocredito']=$this->input->post('f_iniciocredito', TRUE);
		$credito['f_fincredito']=$this->input->post('f_fincredito', TRUE);
		$credito['factura']=$this->input->post('factura', TRUE);
		$data_wrap["inser"]="false";
	
		if($credito['cantidad_inicial']){
		$this->load->model('Mod_credito');	
		$result = $this->Mod_credito->inserta($credito);
		if($result>0){
			$data_wrap["inser"]="true";
			}
		//$this->load->view('api/result',$data);
		//$data["frame"]=$this->load->view('template',"",true);
		
		}
		//CARGAMOS MODELOS PARA PROVEEDOR
		$this->load->model('Mod_proveedor');	
		$data_wrap["prov"] = $this->Mod_proveedor->lista_e();
		$data["frame"]=$this->load->view('credito/nuevo',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
	}
	
	public function elimina($id){
	if($id)
		{
		$this->load->model('Mod_credito');
		$data["credito"] = $this->Mod_credito->consulta($id);	
		$seguro = $this->input->post('seguro', TRUE);
		
			if( $seguro ){
			$this->Mod_credito->elimina($id);
			 redirect('/credito/', 'refresh');
			}else{
					$this->load->view('credito/elimina_credito',$data);
					}
		
		}else{
			redirect('/credito/', 'refresh');
			}
	
	}
	
	public function pago($id){
	if($id)
		{
		$this->load->model('Mod_credito');
		$data["credito"] = $this->Mod_credito->consulta($id);	
		$seguro = $this->input->post('seguro', TRUE);
		$pago = $this->input->post('abono', TRUE);
		
		
			if( $seguro ){
		
			$this->Mod_credito->pago($id,$pago);
			 redirect('/credito/', 'refresh');
			}else{
		
					$this->load->view('credito/pago',$data);
					
					}
		
		}else{
			redirect('/credito/', 'refresh');
			}
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */