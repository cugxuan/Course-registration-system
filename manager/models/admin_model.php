<?php
//data 数据库操作模型

class Data_model extends CI_Model {
   function __construct()
    {
        parent::__construct();
    }

	
	//获取数据列表  $order 排序 如id desc , $table 为表名
	function get_data($order,$table)
	{
		$this->db->order_by($order);
		$query=$this->db->get($table);
		return $query->result_array();	
	}
	
        
        //获取数据列表  $order 排序 如id desc , $table 为表名  ->分页用
	function get_data_bypage($order,$table,$num,$offset)
	{
		$this->db->order_by($order);
		$query=$this->db->get($table,$num,$offset);
		return $query->result_array();	
	}
	
        
        
	
	//获取一条数据
	function get_adata($id,$table)
	{
		$query=$this->db->get_where($table,array('id'=>$id));		
		$row = $query->row_array();		
		return  $row;	  //row_array(); //
	}
	
	
      //查询数据库中是否存在某个数据,$some为表中匹配字段,$table为查询表
	function get_exists_data($some,$table)
    {
                            $query = $this->db->get_where($table, $some); //$some  类似数组 array('city_name' => $city_name)
                            //return $query->row();
                            return $query->num_rows(); //返回条数，
        //return $query->result();
    }


//$post 为发过来的数组post，类型 array('desc'=>$_POST['desc'],'stime'=>time())
    function insert_data($post,$table)
    {
	
                                  $this->db->insert($table, $post);
				
		$id = $this->db->insert_id(); // 返回插入数据的id			
		return $id;	

    }

    function update_data($id,$post,$table)
    {
        $query=$this->db->update($table, $post, array('id' => $id));
		return $query;
    }
	
	
	  function delete_data($id,$table)
    {
                 $query=$this->db->delete($table, array('id' => $id));
                   return $query;
    }



}
?>