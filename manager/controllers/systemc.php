<?php
if (! defined ( 'BASEPATH' ))	exit ( 'No direct script access allowed' );

class Systemc extends CI_Controller {
	
	function __construct() {
		parent::__construct ();
	}
	
	public function index(){
		if ($this->session->userdata( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}

		if ($this->session->userdata ( 'manage_role' ) != '10') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("您没有此操作权限 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$id = 1;

		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'system' );

		$data ['title'] = '系统设置 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 62; // class="current"
		
		$list ['info'] = '系统设置';
		$list ['action'] = 'edit';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'system', $list );
	}
		
	
	// ===============  do ========================
	public function system_do($id) {
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		if ($this->session->userdata ( 'manage_role' ) != '10') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("您没有此操作权限 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		$id = intval ( $id );
		
		$kaochang_count = trim(htmlspecialchars ( $this->input->post ( 'kaochang_count' ) ));
		$per_kaochang_zuowei_count = htmlspecialchars ( $this->input->post ( 'per_kaochang_zuowei_count' ) );
		$sys_title = trim(htmlspecialchars ( $this->input->post ( 'sys_title' ) ));
		
		$data ['title'] = '系统设置 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 62; // class="current"
		
		$post = array (
					'kaochang_count' => intval($kaochang_count),
					'per_kaochang_zuowei_count' => $per_kaochang_zuowei_count,
					'sys_title' => $sys_title 
			);
		
		$this->load->model ( 'Data_model' );
		$this->Data_model->update_data ( $id, $post, 'system' );
		
		$status ['msg'] = '系统设置成功！';
		$this->load->view ( 'status', $status );
	}
	
	
	/**
	 * 初始系统   座位表
	 */
	public function init_system(){
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		if ($this->session->userdata ( 'manage_role' ) != '10') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("您没有此操作权限 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$id = 1;		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'system' );
		
		$data ['title'] = '系统初始化 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 63; // class="current"
		
		$list ['info'] = '系统初始化';
		$list ['action'] = 'edit';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'init_system', $list );
	}
	
	/**
	 * 初始系统   座位表
	 */
	public function init_system_do(){
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		if ($this->session->userdata ( 'manage_role' ) != '10') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("您没有此操作权限 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		$id = 1;
	
		$this->load->model ( 'Data_model' );
		$sysConfig = $this->Data_model->get_adata ( $id, 'system' );

		$maxKaoChang=$sysConfig['kaochang_count'];
		$perZuoWeiCount=$sysConfig['per_kaochang_zuowei_count'];
		$time=time();
		
		//清空座位表
		$this->db->from('zuowei');
		$this->db->truncate();
		
		for($i=1;$i<=$maxKaoChang;$i++){			
			for ($j=1;$j<=$perZuoWeiCount;$j++){
				for($part=1;$part<=2;$part++){
					$zuowei_all_num=substr('00'.$i, -2).substr('00'.$j, -2);
					$data = array (
							'kaochang_num' => $i,
							'zuowei_num' => $j,
							'zuowei_all_num'=>$zuowei_all_num,
							'part' => $part,
							'kaosheng_no' => '0',
							'create_time' => $time,
							'update_time' => $time,
					);
					$this->Data_model->insert_data($data, 'zuowei');
				}
			}
			
		}
		
				
		
		$status ['msg'] = '系统设置成功！';
		$this->load->view ( 'status', $status );
	}
	
}
?>