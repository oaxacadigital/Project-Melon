<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venta extends CI_Controller {
	
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
	public function hoy(){	
	
	
		$hoy = date('Y-m-d');
		$datos['anio'] = date('Y');
		$datos['mes'] = date('m');
		$datos['dia'] = date('d');
		
		switch($datos['mes']){
			case 01: 
				$datos['mes'] = "Enero";
				break;
			case 02: 
				$datos['mes'] = "Febrero";
				break;
			case 03: 
				$datos['mes'] = "Marzo";
				break;
			case 04: 
				$datos['mes'] = "Abril";
				break;
			case 05: 
				$datos['mes'] = "Mayo";
				break;
			case 06: 
				$datos['mes'] = "Junio";
				break;
			case 07: 
				$datos['mes'] = "Julio";
				break;
			case 08: 
				$datos['mes'] = "Agosto";
				break;
			case 09: 
				$datos['mes'] = "Septiembre";
				break;
			case 10: 
				$datos['mes'] = "Octubre";
				break;
			case 11: 
				$datos['mes'] = "Noviembre";
				break;
			case 12: 
				$datos['mes'] = "Diciembre";
				break;
		}

		$this->load->model('Mod_finanzas');
		$datos_dia = $this->Mod_finanzas->ventadia($hoy);
		$datos_mes = $this->Mod_finanzas->ventames($datos['anio'], $datos['mes']);	
		
		//dia
		$total_precio_h = 0;
		$total_ventas_h = 0;
		foreach($datos_dia as $row){
			$total_precio_h = $total_precio_h + $row['subtotal'];	
			$total_ventas_h++;
		}
		
		
		//mes
		$total_precio_m = 0;
		$total_ventas_m = 0;
		foreach($datos_mes as $row){
			$total_precio_m = $total_precio_m + $row['subtotal'];	
			$total_ventas_m++;
		}
		
		$datos['total_hoy'] = $total_precio_h;
		$datos['cantidad_hoy'] = $total_ventas_h;
		$datos['total_mes'] = $total_precio_m;
		$datos['cantidad_mes'] = $total_ventas_m;
		
		//print_r($datos);
		$data["frame"] = $this->load->view('reporte/reporte', $datos, true);
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$this->load->view('template/index',$data);
		
	}
	
	public function pordia($fecha){
				$this->load->model('Mod_finanzas');
		$datos_dia = $this->Mod_finanzas->ventadia($fecha);
		
		$total_precio = 0;
		$total_ventas = 0;
		foreach($datos_dia as $row){
			$total_precio = $total_precio + $row['subtotal'];	
			$total_ventas++;
		}

		$datos['total'] = $total_precio;
		$datos['cantidad'] = $total_ventas;
		$datos['fecha'] = $fecha;
		
		$datos['ventas'] = $datos_dia;
		//print_r($datos_dia);
		/**/
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$data["frame"] = $this->load->view('reporte/reporte_pordia', $datos, true);
		$this->load->view('template/index',$data);
/**/	
	}
	
	public function dia($anio, $mes, $dia){
		$fecha = "$anio-$mes-$dia";
		switch($mes){
			case 01: 
				$datos['mes'] = "Enero";
				break;
			case 02: 
				$datos['mes'] = "Febrero";
				break;
			case 03: 
				$datos['mes'] = "Marzo";
				break;
			case 04: 
				$datos['mes'] = "Abril";
				break;
			case 05: 
				$datos['mes'] = "Mayo";
				break;
			case 06: 
				$datos['mes'] = "Junio";
				break;
			case 07: 
				$datos['mes'] = "Julio";
				break;
			case 08: 
				$datos['mes'] = "Agosto";
				break;
			case 09: 
				$datos['mes'] = "Septiembre";
				break;
			case 10: 
				$datos['mes'] = "Octubre";
				break;
			case 11: 
				$datos['mes'] = "Noviembre";
				break;
			case 12: 
				$datos['mes'] = "Diciembre";
				break;
		}

		$this->load->model('Mod_finanzas');
		$datos_dia = $this->Mod_finanzas->ventadia($fecha);
		
		$total_precio = 0;
		$total_ventas = 0;
		foreach($datos_dia as $row){
			$total_precio = $total_precio + $row['subtotal'];	
			$total_ventas++;
		}

		$datos['total'] = $total_precio;
		$datos['cantidad'] = $total_ventas;
		$datos['anio'] = $anio;
		//$datos['mes'] = $mes;
		$datos['dia'] = $dia;
		$datos['ventas'] = $datos_dia;
		//print_r($datos_dia);
		/**/
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$data["frame"] = $this->load->view('reporte/reporte_dia', $datos, true);
		$this->load->view('template/index',$data);
/**/	
	}
	public function mes($anio, $mes){
		switch($mes){
			case 01: 
				$datos['mes'] = "Enero";
				break;
			case 02: 
				$datos['mes'] = "Febrero";
				break;
			case 03: 
				$datos['mes'] = "Marzo";
				break;
			case 04: 
				$datos['mes'] = "Abril";
				break;
			case 05: 
				$datos['mes'] = "Mayo";
				break;
			case 06: 
				$datos['mes'] = "Junio";
				break;
			case 07: 
				$datos['mes'] = "Julio";
				break;
			case 08: 
				$datos['mes'] = "Agosto";
				break;
			case 09: 
				$datos['mes'] = "Septiembre";
				break;
			case 10: 
				$datos['mes'] = "Octubre";
				break;
			case 11: 
				$datos['mes'] = "Noviembre";
				break;
			case 12: 
				$datos['mes'] = "Diciembre";
				break;
		}

		$this->load->model('Mod_finanzas');
		$datos_dia = $this->Mod_finanzas->ventames($anio, $mes);
		
		$total_precio = 0;
		$total_ventas = 0;
		foreach($datos_dia as $row){
			$total_precio = $total_precio + $row['subtotal'];	
			$total_ventas++;
		}

		$datos['total'] = $total_precio;
		$datos['cantidad'] = $total_ventas;
		$datos['anio'] = $anio;
		//$datos['mes'] = $mes;
		$datos['ventas'] = $datos_dia;
		
		$data["frame"] = $this->load->view('reporte/reporte_mes', $datos, true);
		$this->load->view('template/index',$data);
	}
	public function periodo($fecha_inicio, $fecha_fin){
		$this->load->model('Mod_finanzas');
		$datos_periodo = $this->Mod_finanzas->periodo($fecha_inicio, $fecha_fin);
		
		$total_precio = 0;
		$total_ventas = 0;
		foreach($datos_periodo as $row){
			$total_precio = $total_precio + $row['subtotal'];	
			$total_ventas++;
		}

		$datos['total'] = $total_precio;
		$datos['cantidad'] = $total_ventas;
		$datos['fecha_inicio'] = $fecha_inicio;
		$datos['fecha_fin'] = $fecha_fin;
		$datos['ventas'] = $datos_periodo;
		
		$data['username']	= $this->tank_auth->get_username();
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		
		$data["frame"] = $this->load->view('reporte/reporte_periodo', $datos, true);
		$this->load->view('template/index',$data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */