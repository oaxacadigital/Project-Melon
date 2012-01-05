<?php
class Mod_proveedor extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function buscar($dato){
		$this->db->like('razonsocial', $dato);
		$query = $this->db->get('proveedor');
		 return $query->result(); 
	}
	
	function inserta($array_provedor){
		$query = $this->db->insert('proveedor', $array_provedor);
		if ($query) {
			return true;
		}
	}
	
	function lista(){
		$query = $this->db->get('proveedor');
		
		 return $query->result(); 
	}
	
	function consulta($id){		
		$query = $this->db->get_where('proveedor', array('idproveedor' => $id));	
        return $query->row_array(); 
	}
	
	function elimina($id){		
		$this->db->delete('proveedor', array('idproveedor' => $id)); 
	}
	
	function actualiza($id, $proveedor){	
		$this->db->where('idproveedor', $id);
		$query = $this->db->update('proveedor', $proveedor); 
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	
	function lista_e(){
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
	}
	
}
?>