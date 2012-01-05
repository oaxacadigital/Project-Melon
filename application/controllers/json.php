<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller {
	
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
		redirect('/', 'refresh');
	}
	
	public function articulos()
	{
		$this->load->model('Mod_articulos');	
		$data['datos'] = $this->Mod_articulos->lista();

		$this->load->view('api/result',$data);
	}
	
	public function autosuggest()
		{
		$this->load->model('Mod_articulos');	
		$data['datos'] = $this->Mod_articulos->autosuggest_lista();

		echo json_encode($data['datos']);
		}
		
}
?>