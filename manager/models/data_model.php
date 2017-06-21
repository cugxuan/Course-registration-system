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
	//获取where 数据列表  $order 排序 如id desc , $table 为表名  ->分页用   where
	function get_wdata_bypagecount($where,$table)
	{
	
		$query = $this->db->get_where($table, $where);
		return $query->num_rows();
	}
            //获取where 数据列表  $order 排序 如id desc , $table 为表名  ->分页用   where
	function get_wdata_bypage($where,$order,$table,$offset,$num)
	{
	
		$this->db->order_by($order);
		$query = $this->db->get_where($table, $where,$num,$offset);
		return $query->result_array();
	}   
	
	
	//获取where 数据列表  $order 排序 如id desc , $table 为表名     where
	function get_wdata($where,$order,$table)
	{	
		$this->db->order_by($order);
		$query = $this->db->get_where($table, $where);
		return $query->result_array();
	}
        
	
	//获取一条数据
	function get_adata($id,$table)
	{
		$query=$this->db->get_where($table,array('id'=>$id));		
		$row = $query->row_array();		
		return  $row;	  //row_array(); //
	}
	
	//获取一条数据的某些属性
	function get_data_some($id,$table)
	{
		$query=$this->db->where('id',$id)->select('capacity,number')->get($table);
		$row=$query->row_array();
		return  $row;	  //row_array(); //
	}
	
	function get_alldata($id,$table1,$table2)
	{//获取某个学生已报名的考试
		
		
		$query2 = $this->db->get_where($table1, array('id'=>$id)); //$some  类似数组 array('city_name' => $city_name)
		$num=$query2->num_rows(); //返回条数，
		if($num>0){
			$query1=$this->db->where('id',$id)->select('exam_id')->get($table1)->result_array();
			
			$re=array();
			foreach($query1 as $resp){
				$re[]=$resp['exam_id'];
			}
			$query=$this->db->where_in('id',$re)->get($table2)->result_array();
			return $query;
		}else
			return ' ';
	}
	
	
      //查询数据库中是否存在某个数据,$some为表中匹配字段,$table为查询表
	function get_exists_data($some,$table)
    {
                            $query = $this->db->get_where($table, $some); //$some  类似数组 array('city_name' => $city_name)
                            //return $query->row();
                            return $query->num_rows(); //返回条数，
        //return $query->result();
    }
	
      //查询数据库中是否存在某个数据,$some为表中匹配字段,$table为查询表	    login登录验证
	function get_login($some,$table)
    {
                            $query = $this->db->get_where($table, $some); //$some  类似数组 array('city_name' => $city_name)
                            //return $query->row();
                            return $query->row_array(); //返回结果，
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
	
    function delete_table($table)
    {
    	$query=$this->db->delete($table);
    	return $query;
    }
    
	function delete_data($id,$table)
    {
                 $query=$this->db->delete($table, array('id' => $id));
                   return $query;
    }

    function delete_data_line($id,$exam_id,$table)
    {
    	$query=$this->db->delete($table, array('id' => $id,'exam_id'=>$exam_id));
    	return $query;
    }
	/*function getZuoWeiListByKCNum($kaochang_num,$kaosheng_id){
		$sql='select z.id as zid,z.kaochang_num as zkaochang_num,z.zuowei_num as zzuowei_num,z.zuowei_all_num as zzuowei_all_num,z.part as zpart,z.kaosheng_id as zkaosheng_id,z.kaosheng_no as zkaosheng_no,k.id as kid,k.daqu_num as kdaqu_num,k.kaosheng_num as kkaosheng_num,k.kaosheng_no as kkaosheng_no,k.zuowei_id as kzuowei_id,k.zuowei_all_num as kzuowei_all_num,k.name as kname,k.school_name as kschool_name  from core_zuowei as z
				left join core_kaosheng as k  on z.kaosheng_id=k.id
				where z.kaochang_num='.$kaochang_num.'		
				order by z.kaochang_num asc,z.zuowei_num asc,z.part asc		
				';
		$query=$this->db->query($sql);		
		return $query->result_array();
	}*/

}
?>