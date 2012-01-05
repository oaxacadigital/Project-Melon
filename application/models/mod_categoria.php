<?php

class Mod_categoria extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	function lista_e(){
		$this->db->select('idcategoria, nombre_c');
		$query = $this->db->get('categoria');
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