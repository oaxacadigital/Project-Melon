<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller {

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
		
		
	 	$venta['subtotal'] = $this->input->post('subtotal');
		$venta['iva'] = $this->input->post('iva');
		$venta['total'] = $this->input->post('total');
		$venta['f_venta'] = date("Y-m-d");
		$venta['h_venta'] = date("H:i:s");
		
		$id_producto = $this->input->post('id_producto');
		$cantidad = $this->input->post('cantidad');
		$total_producto = $this->input->post('total_producto');
		
		$data["inser"] = false;		
		
		if($venta["total"]){
			$this->load->model('Mod_ventas');
			$this->load->model('Mod_articulos');		
			$id_venta = $this->Mod_ventas->inserta($venta);
			
			$i=0;
			foreach($id_producto as $item)
				{				
				$articulo['idventa'] = $id_venta;
				$articulo['idarticulo'] = $id_producto[$i];
				$articulo['cantidad'] = $cantidad[$i];
				$articulo['total'] = $total_producto[$i];
				$actualiza_venta = $this->Mod_ventas->venta_articulo($articulo);
							
				$articulo_actualizable = $this->Mod_articulos->articulo_inventario($id_producto[$i]);
				$cantidad_actualizada = $articulo_actualizable['existencia']-$cantidad[$i];
				$actualizar_articulo = $this->Mod_articulos->actualiza_inventario($id_producto[$i],$cantidad_actualizada);
				
				$i++;
				$data["inser"] = true;
				}	
			
			}
		
		$data['username']	= $this->tank_auth->get_username();		
		$this->load->model('Mod_finanzas');		
		$data['total_dia'] = $this->Mod_finanzas->sidebar_ventas_total();
		$data["frame"] = $this->load->view('ventas/nueva', $data, true);
		$this->load->view('template/index',$data);
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */