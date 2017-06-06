<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Zuowei extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
	
		
		redirect ( site_url ( 'zuowei/zuowei_list' ) );
	}
	
	/**
	 * 座位列表 start
	 */
	// =============== 座位 列表 ========================
	public function zuowei_list($page = 1) {
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		
		date_default_timezone_set ( 'Asia/Shanghai' );
		
		/*
		 * 判断参数$page 大小start
		 */
		if ($page < 1) {
			$page = 1;
		} else {
			$page = intval( $page );
		}
		
		$num = 100; // 每页条数
		$offset = ($page - 1) * $num;
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_data_bypage ( 'id asc', 'zuowei', $num, $offset );
		
		$data ['title'] = '座位列表 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 13; // class="current"
		
		$list ['info'] = '座位';
		$list ['total_rows'] = $this->db->count_all ( 'zuowei' );
		
		$config ['page_url'] = 'zuowei/zuowei_list';
		$config ['page_size'] = $num;
		$config ['rows_num'] = $this->db->count_all ( 'zuowei' );
		$config ['page_num'] = $page;
		$this->load->library ( 'Custom_pagination' );
		$this->custom_pagination->init ( $config );
		$list ['fenye'] = $this->custom_pagination->create_links ();
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'zuowei_list', $list );
	}
	
}
?>