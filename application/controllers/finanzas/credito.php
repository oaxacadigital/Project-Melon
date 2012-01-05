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
		$this->load->view('template/index');
	}
	
	public function pordia($fecha){
		$this->load->model('Mod_finanzas');
		$datos = $this->Mod_finanzas->creditodia($fecha);
		
		$cantidad_actual = 0;
		$total = 0;
		$i=0;
		$d = array();
		foreach($datos as $row){
			$cantidad_actual = $cantidad_actual + $row['cantidad_actual'];	
			$total++;
			$d[$i] = $row;
			$i++; 
		}
		
		$datos['cantidad_actual'] = $cantidad_actual;
		$datos['num_credito'] = $total;
		$datos['fecha'] = $fecha;		
		$datos['creditos'] = $d;
		
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		
		$data["frame"] = $this->load->view('reporte/credito_pordia', $datos, true);
		$this->load->view('template/index',$data);		
		}
		
	
	public function dia($fecha, $mes, $dia){
		$fecha = "$anio-$mes-$dia";
		switch($mes){
			case 01: 
				$nombre_mes = "Enero";
				break;
			case 02: 
				$nombre_mes = "Febrero";
				break;
			case 03: 
				$nombre_mes = "Marzo";
				break;
			case 04: 
				$nombre_mes = "Abril";
				break;
			case 05: 
				$nombre_mes = "Mayo";
				break;
			case 06: 
				$nombre_mes = "Junio";
				break;
			case 07: 
				$nombre_mes = "Julio";
				break;
			case 08: 
				$nombre_mes = "Agosto";
				break;
			case 09: 
				$nombre_mes = "Septiembre";
				break;
			case 10: 
				$nombre_mes = "Octubre";
				break;
			case 11: 
				$nombre_mes = "Noviembre";
				break;
			case 12: 
				$nombre_mes = "Diciembre";
				break;
		}

		$this->load->model('Mod_finanzas');
		$datos = $this->Mod_finanzas->creditodia($fecha);
		
		$cantidad_actual = 0;
		$total = 0;
		$i=0;
		$d = array();
		foreach($datos as $row){
			$cantidad_actual = $cantidad_actual + $row['cantidad_actual'];	
			$total++;
			$d[$i] = $row;
			$i++; 
		}
		
		$datos['cantidad_actual'] = $cantidad_actual;
		$datos['num_credito'] = $total;
		$datos['anio'] = $anio;
		$datos['mes'] = $nombre_mes;
		$datos['dia'] = $dia;
		$datos['creditos'] = $d;
		
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		
		$data["frame"] = $this->load->view('reporte/credito_dia', $datos, true);
		$this->load->view('template/index',$data);

	}
	public function mes($anio, $mes){
				switch($mes){
			case 01: 
				$nombre_mes = "Enero";
				break;
			case 02: 
				$nombre_mes = "Febrero";
				break;
			case 03: 
				$nombre_mes = "Marzo";
				break;
			case 04: 
				$nombre_mes = "Abril";
				break;
			case 05: 
				$nombre_mes = "Mayo";
				break;
			case 06: 
				$nombre_mes = "Junio";
				break;
			case 07: 
				$nombre_mes = "Julio";
				break;
			case 08: 
				$nombre_mes = "Agosto";
				break;
			case 09: 
				$nombre_mes = "Septiembre";
				break;
			case 10: 
				$nombre_mes = "Octubre";
				break;
			case 11: 
				$nombre_mes = "Noviembre";
				break;
			case 12: 
				$nombre_mes = "Diciembre";
				break;
		}

		$this->load->model('Mod_finanzas');
		$datos = $this->Mod_finanzas->creditomes($anio, $mes);
		
		$cantidad_actual = 0;
		$total = 0;
		$i=0;
		$d = array();
		foreach($datos as $row){
			$cantidad_actual = $cantidad_actual + $row['cantidad_actual'];	
			$total++;
			$d[$i] = $row;
			$i++; 
		}
		
		$datos['cantidad_actual'] = $cantidad_actual;
		$datos['num_credito'] = $total;
		$datos['anio'] = $anio;
		$datos['mes'] = $nombre_mes;
		//$datos['dia'] = $dia;
		$datos['creditos'] = $d;
		
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		
		$data["frame"] = $this->load->view('reporte/credito_mes', $datos, true);
		$this->load->view('template/index',$data);
	}
	public function periodo($fecha_inicio, $fecha_fin){
		$this->load->model('Mod_finanzas');
		$datos = $this->Mod_finanzas->periodocredito($fecha_inicio, $fecha_fin);
		
		$cantidad_actual = 0;
		$total = 0;
		$i=0;
		$d=array();
		foreach($datos as $row){
			$cantidad_actual = $cantidad_actual + $row['cantidad_actual'];	
			$total++;
			$d[$i] = $row;
			$i++; 
		}
		
		$datos['cantidad_actual'] = $cantidad_actual;
		$datos['num_credito'] = $total;
		$datos['creditos'] = $d;
		$datos['fecha_inicio'] = $fecha_inicio;
		$datos['fecha_fin'] = $fecha_fin;
		
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		
		$data["frame"] = $this->load->view('reporte/credito_periodo', $datos, true);
		$this->load->view('template/index',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */