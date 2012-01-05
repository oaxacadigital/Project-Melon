<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulo extends CI_Controller {
	
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
				/*
		$tipo = $this->input->get('type', TRUE);
		$q = $this->input->get('q', TRUE);
		$this->load->model('Mod_articulos');	
		switch ($tipo){
			case 'all':
				$data_wrap['info'] = $this->Mod_articulos->lista();
				break;
			case 'agotarse':
				$data_wrap['info'] = $this->Mod_articulos->agotarse();
				break;
			case 'buscar':
				$data_wrap['info'] = $this->Mod_articulos->buscar($q);
				break;
			case 'categoria':
				$data_wrap['info'] = $this->Mod_articulos->categoria($q);
				break;
			case 'codigo':
				$data_wrap['info'] = $this->Mod_articulos->codigo($q);
				break;
			default:
				$data_wrap['info'] = $this->Mod_articulos->lista();
		}/**/
		//PAGINACION
		$this->load->model('Mod_articulos');
		$q = $this->input->get('q', TRUE);
		
		if ($q != NULL){
			$data_wrap['info'] = $this->Mod_articulos->buscar($q);
		} else {
			$data_wrap['info'] = $this->Mod_articulos->lista();
		}
		$elementos = 10;
		$paginas = (integer) (($data_wrap['info']['results'] / $elementos) + 1);
		$data_wrap['info']['paginas'] = $paginas;
		$data_wrap['info']['elementos'] = $elementos;
		
		/***/
		
		$data["frame"] = $this->load->view('articulos/lista',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();


		$this->load->view('template/index',$data);
	}
	
	public function nuevo()
	{
		
		//$articulo = array();
		
		//$articulo['idarticulo']=$this->input->post('idarticulo', TRUE);
		$articulo['nombre']=$this->input->post('nombre', TRUE);
		$articulo['descripcion']=$this->input->post('descripcion', TRUE);
		$articulo['p_compra']=$this->input->post('p_compra', TRUE);
		$articulo['p_venta']=$this->input->post('p_venta', TRUE);
		$articulo['existencia']=$this->input->post('stock_inicial', TRUE);
		$articulo['stock_min']=$this->input->post('stock_minimo', TRUE);
		$articulo['proveedor']=$this->input->post('proveedor', TRUE);
		$articulo['categoria']=$this->input->post('categoria', TRUE);
		$articulo['codigo_art']=$this->input->post('clave', TRUE);
		$data_wrap["inser"]="false";
		if($articulo['descripcion']){
		$this->load->model('Mod_articulos');	
		$result = $this->Mod_articulos->inserta($articulo);
		if($result>0){
			$data_wrap["inser"]="true";
			}
		//$this->load->view('api/result',$data);
		//$data["frame"]=$this->load->view('template',"",true);
		
		}
		//CARGAMOS MODELOS PARA CATEGORIA Y PROVEEDOR
		$this->load->model('Mod_categoria');	
		$data_wrap["cat"] = $this->Mod_categoria->lista_e();
		$this->load->model('Mod_proveedor');	
		$data_wrap["prov"] = $this->Mod_proveedor->lista_e();
		$data["frame"]=$this->load->view('articulos/nuevo',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		
		$this->load->view('template/index',$data);
	}
	public function lista(){
		$this->load->model('Mod_articulos');	
		$data_wrap['info'] = $this->Mod_articulos->lista();
	
		$data["frame"] = $this->load->view('articulos/lista',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
		
	}
	public function detalle($id){
		$this->load->model('Mod_articulos');
		$data["articulo"] = $this->Mod_articulos->consulta($id);	
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('articulos/lista_detalle',$data);	
	}
	public function consulta($id){
		$this->load->model('Mod_articulos');
		$data_wrap = $this->Mod_articulos->consulta($id);
		$this->load->model('Mod_categoria');	
		$data_wrap["cat"] = $this->Mod_categoria->lista_e();
		$this->load->model('Mod_proveedor');	
		$data_wrap["prov"] = $this->Mod_proveedor->lista_e();
		
		$data["frame"]=$this->load->view('articulos/consulta',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);	
	}
	public function actualiza($id){
		$articulo['idarticulo']=$id;
		//$id = $this->input->post('idarticulo', TRUE);
		$articulo['nombre']=$this->input->post('nombre', TRUE);
		$articulo['descripcion']=$this->input->post('descripcion', TRUE);
		$articulo['p_compra']=$this->input->post('p_compra', TRUE);
		$articulo['p_venta']=$this->input->post('p_venta', TRUE);
		$articulo['existencia']=$this->input->post('existencia', TRUE);
		$articulo['stock_min']=$this->input->post('stock_min', TRUE);
		$articulo['proveedor']=$this->input->post('proveedor', TRUE);
		$articulo['categoria']=$this->input->post('categoria', TRUE);
		$articulo['codigo_art']=$this->input->post('clave', TRUE);
		
		if($articulo['descripcion']){
			$this->load->model('Mod_articulos');	
			$result = $this->Mod_articulos->actualiza($id, $articulo);
			if ($result){
				 redirect('/articulo/lista/', 'refresh');
			}
		}
		//$data["frame"]=$this->load->view('articulos/nuevo',$data_wrap,true);
		//$this->load->view('template/index',$data);
		//$this->load->view('template/index');
	}
	public function poragotarse(){
		$this->load->model('Mod_articulos');
		$data_wrap['info'] = $this->Mod_articulos->poragotarse();
		
		$data["frame"] = $this->load->view('articulos/agotarse',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
	}
	public function elimina($id){
	if($id)
		{
		$this->load->model('Mod_articulos');
		$data["articulo"] = $this->Mod_articulos->consulta($id);	
        $seguro = $this->input->post('seguro', TRUE);
		
			if( $seguro ){
			$this->Mod_articulos->elimina($id);
			 redirect('/articulo/lista/', 'refresh');
			}else{
					$this->load->view('articulos/elimina_articulo',$data);
					}
		
		}else{
			redirect('/', 'refresh');
			}
	
	}
	
}
?>