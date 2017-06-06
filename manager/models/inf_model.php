<?php

class Inf_model extends CI_Model {
   function __construct()
    {
        parent::__construct();
    }

    
	
	function get_news_fl()
	{
		$this->db->order_by("id desc");
		$query=$this->db->get('news_fenlei');
		return $query->result_array();	
	}
	
	function get_anews_fl($id)
	{
		$query=$this->db->get_where('news_fenlei',array('id'=>$id));
		$row = $query->row_array();		
		return  $row;	  //row_array(); //
	}
	
	

    function insert_news_fl($fl_name)
    {
	
		$data=array(
		'fenlei_name'=>$fl_name
		);
        $this->db->insert('news_fenlei', $data);
    }


    function update_news_fl($id,$fl_name)
    {
        $this->fenlei_name   = $fl_name;
        $query=$this->db->update('news_fenlei', $this, array('id' => $id));
		return $query;
    }
	
	
	  function delete_news_fl($id)
    {
        $query=$this->db->delete('news_fenlei', array('id' => $id));
		return $query;
    }



}
?>