<?php

class Mod_credito extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	

	
	function lista(){
		$query = $this->db->get('credito');
		
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row){
			 $this->db->select('razonsocial');
			 $query2 = $this->db->get_where('proveedor', array('idproveedor' => $row['idproveedor']));	
			 $producto=$query2->row_array(); 
			  $array[$i] = array_merge($row, $producto);
			   
			   $i++;
			}
			$result = array('results' => $query->num_rows(), 'data' => $array);
			return $result;
		} else {
			$array = array();
			$result = array('results' => NULL, 'data' => $array);
			return $result;
		}
	}
	
	
	function inserta($credito){
		$query = $this->db->insert('credito', $credito);
		if ($query) {
			return true;
		}
	}
	function consulta($id){		
		$query = $this->db->get_where('credito', array('idcredito' => $id));	
        $credito=$query->row_array(); 
		$this->db->select('razonsocial');
		$query2 = $this->db->get_where('proveedor', array('idproveedor' => $credito['idproveedor']));	
		$proveedor=$query2->row_array(); 
		$articulo=array_merge($credito, $proveedor);
 return $articulo;
	}
	
	function elimina($id){		
		$this->db->delete('credito', array('idcredito' => $id)); 
	}
	
	function pago($id, $pago){	
		$query = $this->db->get_where('credito', array('idcredito' => $id));	
        $credito=$query->row_array(); 
		$array_pago["idcredito"]=$credito['idcredito'];
		$array_pago["f_pago"]=$credito['f_fincredito'];
		$array_pago["abono"]=$pago;
		$credito['cantidad_actual']= $credito['cantidad_actual'] - $pago ;
		$this->db->where('idcredito', $id);
		$query = $this->db->update('credito', $credito); 
		$query = $this->db->insert('pago', $array_pago);
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	
		function agotarse(){
		$this->db->where('existencia <= stock_min');
		$query = $this->db->get('articulo');
		if ($query->num_rows() > 0) {
			$i = 0;
			foreach ($query->result_array() as $row){
				$this->db->select('razonsocial');
				$query2 = $this->db->get_where('proveedor', array('idproveedor' => $row['proveedor']));	
				$producto=$query2->row_array(); 
				$array[$i] = array_merge($row, $producto);
				$i++;
			}
			$result = array('results' => $query->num_rows(), 'data' => $array);
			return $result;
		} else {
			$array = array();
			$result = array('results' => NULL, 'data' => $array);
			return $result;
		} 
	}
	
}

?>