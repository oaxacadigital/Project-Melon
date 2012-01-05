<?php

class Mod_finanzas extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function sidebar_ventas_total(){
		$this->db->select_sum('total');
        $this->db->from('venta');
		$this->db->where('f_venta =', '2011-11-06');				
  		$query = $this->db->get();
  		return $query->row()->total;
		
	}
	
	function ventadia($fecha){
		$this->db->where('f_venta =', $fecha);
		$query = $this->db->get('venta');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row)
			{
			   $array[$i] = $row;
			   $i++;
			}
			return $array;
		} else {
			$array = array();
			return $array;
		}
	}
	function ventames($anio, $mes) {
		$this->db->where('EXTRACT(MONTH from f_venta) =', $mes);
		$this->db->where('EXTRACT(YEAR from f_venta) =', $anio);
		//$this->db->like('f_venta', '__-'.$mes.'-'.$anio); 
		$query = $this->db->get('venta');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row)
			{
			   $array[$i] = $row;
			   $i++;
			}
			return $array;
		} else {
			$array = array();
			return $array;
		}
	}
	function periodo($f_inicio, $f_fin) {
		$this->db->where('f_venta >=', $f_inicio);
		$this->db->where('f_venta <=', $f_fin);
		//$this->db->like('f_venta', '__-'.$mes.'-'.$anio); 
		$query = $this->db->get('venta');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row)
			{
			   $array[$i] = $row;
			   $i++;
			}
			return $array;
		} else {
			$array = array();
			return $array;
		}
	}
	function creditodia($fecha){
		$this->db->where('f_fincredito =', $fecha);
		$query = $this->db->get('credito');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row)
			{
			   $array[$i] = $row;
			   $i++;
			}
			return $array;
		} else {
			$array = array();
			return $array;
		}
	}
	function creditomes($anio, $mes) {
		$this->db->where('EXTRACT(MONTH from f_fincredito) =', $mes);
		$this->db->where('EXTRACT(YEAR from f_fincredito) =', $anio);
		//$this->db->like('f_venta', '__-'.$mes.'-'.$anio); 
		$query = $this->db->get('credito');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row)
			{
			   $array[$i] = $row;
			   $i++;
			}
			return $array;
		} else {
			$array = array();
			return $array;
		}
	}
	function periodocredito($f_inicio, $f_fin) {
		$this->db->where('f_fincredito >=', $f_inicio);
		$this->db->where('f_fincredito <=', $f_fin);
		//$this->db->like('f_venta', '__-'.$mes.'-'.$anio); 
		$query = $this->db->get('credito');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row)
			{
			   $array[$i] = $row;
			   $i++;
			}
			return $array;
		} else {
			$array = array();
			return $array;
		}
	}

}

?>