<?php
class Mod_ventas extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	function inserta($array_ventas){
		$query = $this->db->insert('venta', $array_ventas);
		if ($query) {
			return $this->db->insert_id();
		}
	}
	
	function venta_articulo($array_articulo){
		$query = $this->db->insert('dev_venta', $array_articulo);
		if ($query) {
			return true;
		}
	}
	
	function lista(){
		$query = $this->db->get('venta');
		
		 return $query->result(); 
	}
	
	function consulta($id){		
		$query = $this->db->get_where('venta', array('id_venta' => $id));	
        return $query->row_array(); 
	}
	
	function elimina($id){		
		$this->db->delete('venta', array('id_venta' => $id)); 
	}
	
	function actualiza($id, $proveedor){	
		$this->db->where('id_venta', $id);
		$query = $this->db->update('venta', $proveedor); 
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	
	/*function lista_e(){
		$this->db->select('idproveedor, razonsocial');
		$query = $this->db->get('proveedor');
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
	}*/
	
}
?>