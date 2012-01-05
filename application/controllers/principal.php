<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

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
		$this->load->model('Mod_articulos');	
		$data_wrap['info'] = $this->Mod_articulos->lista();
		
		$data["frame"] = $this->load->view('articulos/lista',$data_wrap,true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */