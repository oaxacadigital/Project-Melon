<?php

class Mod_articulos extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->database();
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
	function codigo($cod){
		$this->db->like('codigo_art', $cod);
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
	function categoria($cat){
		$this->db->like('categoria', $cat);
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
	function buscar($dato){
		$this->db->like('nombre', $dato);
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
	
	function lista(){
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
	
	function autosuggest_lista(){
		$this->db->select('idarticulo, nombre, p_venta, codigo_art, existencia');
		$query = $this->db->get('articulo');
		
		if ($query->num_rows() > 0) {			
			$result = $query->result_array();
			return $result;
		} else {
			$array = array();
			$result = array('data' => $array);
			return $result;
		}
	}
	
	function inserta($array_articulo){
		$query = $this->db->insert('articulo', $array_articulo);
		if ($query) {
			return true;
		}
	}
	
	function consulta($id){		
		$query = $this->db->get_where('articulo', array('idarticulo' => $id));	
        $articulo=$query->row_array(); 
		$this->db->select('razonsocial');
		$query2 = $this->db->get_where('proveedor', array('idproveedor' => $articulo['proveedor']));	
		$proveedor=$query2->row_array(); 
		$this->db->select('nombre_c');
	   $query3 = $this->db->get_where('categoria', array('idcategoria' => $articulo['categoria']));	
	 $categoria=$query3->row_array(); 
		$articulo=array_merge($articulo, $proveedor,$categoria);
 return $articulo;
	}
	
	function elimina($id){		
		$this->db->delete('articulo', array('idarticulo' => $id)); 
	}
	
	function actualiza($id, $articulo){	
		$this->db->where('idarticulo', $id);
		$query = $this->db->update('articulo', $articulo); 
		if ($query){
			return true;
		} else {
			return false;
		}
	}
	
	function articulo_inventario($idarticulo){
		$query = $this->db->get_where('articulo', array('idarticulo' => $idarticulo));	
		return $query->row_array();
	}
	
	function actualiza_inventario($id_articulo , $cantidad){
		$data = array(
               'existencia' => $cantidad
            );

		$this->db->where('idarticulo', $id_articulo);
		$this->db->update('articulo', $data); 

	}

	function poragotarse(){
		$this->db->where('stock_min > existencia');
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