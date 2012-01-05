<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reporte extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}		
	}

	function index()
	{
		$reporte = $this->input->post('envio_reporte');
		$tipo = $this->input->post('tipo');
		$periodo = $this->input->post('periodo');
		
		$d_diario = $this->input->post('d_diario');
		
		$anio = $this->input->post('anio');
		$mes = $this->input->post('mes');
		
		$f_inicio = $this->input->post('f_inicio');		
		$f_fin = $this->input->post('f_fin');
		
		
		
		if($reporte){
			
			if($tipo == "credito")
				{
				if($periodo == "dia")
					{							
						 redirect('/finanzas/credito/pordia/'.$d_diario, 'refresh');
					}
				if($periodo == "mensual")
					{
						redirect('/finanzas/credito/mes/'.$anio.'/'.$mes, 'refresh');
					}
				if($periodo == "intervalo")
					{
						redirect('/finanzas/credito/periodo/'.$f_inicio.'/'.$f_fin, 'refresh');
					}	
				}
			
			if($tipo == "venta")
				{
				if($periodo == "dia")
					{							
						 redirect('/finanzas/venta/pordia/'.$d_diario, 'refresh');
					}
				if($periodo == "mensual")
					{
						redirect('/finanzas/venta/mes/'.$anio.'/'.$mes, 'refresh');
					}
				if($periodo == "intervalo")
					{
						redirect('/finanzas/venta/periodo/'.$f_inicio.'/'.$f_fin, 'refresh');
					}	
				}
			
			}
			else{
		
			$datos = array();
			$data["frame"] = $this->load->view('reporte/index', $datos, true);
			$data['user_id'] = $this->tank_auth->get_user_id();
			$data['username'] = $this->tank_auth->get_username();
			$this->load->model('Mod_finanzas');		
			$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
			
			$this->load->view('template/index',$data);
			}
	}
}
