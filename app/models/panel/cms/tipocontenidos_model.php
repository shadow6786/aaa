<?php

class Tipocontenidos_model extends CI_model {

	function __construct()
	{
		parent::__construct();
	}
	
	function get($fields, $where='',$perpage=0,$start=0,$one=false,$array='array'){
		$this->db->select($fields,FALSE);
        $this->db->from('cms_tipocontenidos');
        $this->db->limit($perpage,$start);
        if($where){
        	$this->db->where($where);
        }
        $query = $this->db->get();
        $result =  !$one  ? $query->result($array) : $query->row() ;
        return $result;
	}
	
	function get_list($field, $where='',$check_field,$perpage=0,$start=0,$one=false,$array='array')
	{
		$this->db->select($fields);
        $this->db->from('cms_tipocontenidos');
        $this->db->limit($perpage,$start);
        if($where){
        	$this->db->where($where);
        }
        $query = $this->db->get();
        $result =  !$one  ? $query->result($array) : $query->row() ;
        return $result;
	}
	
	function add($data){
        $this->db->insert('cms_tipocontenidos', $data);
        if ($this->db->affected_rows() == 1)
		{
			return $this->db->insert_id();
		}
		return FALSE;
    }
	
	function edit($data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update('cms_tipocontenidos', $data);
        if ($this->db->affected_rows())
		{
			return TRUE;
		}
		return FALSE;
    }
	
    function delete($fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete('cms_tipocontenidos');
        if ($this->db->affected_rows() == 1)
		{
			return TRUE;
		}
		return FALSE;
	}
	function get_tipocontenidos_combo($fields,$where='')
	{
		$this->db->select($fields);
		$this->db->from('cms_tipocontenidos');
		if($where)
		{
			$this->db->where($where);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return FALSE;	
		}
	}
	
	function count(){
		return $this->db->count_all('cms_tipocontenidos');
	}
}