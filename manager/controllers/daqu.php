<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Daqu extends CI_Controller {
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
		if ($this->session->userdata ( 'manage_role' ) != '10') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("您没有此操作权限 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		redirect ( site_url ( 'daqu/daqu_add' ) );
	}
	
	/**
	 * 大区列表 start
	 */
	// =============== 大区 列表 ========================
	public function daqu_list($page = 1) {
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
		
		date_default_timezone_set ( 'Asia/Shanghai' );
		
		/*
		 * 判断参数$page 大小start
		 */
		if ($page < 1) {
			$page = 1;
		} else {
			$page = intval( $page );
		}
		
		$num = 20; // 每页条数
		$offset = ($page - 1) * $num;
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_data_bypage ( 'id desc', 'daqu', $num, $offset );
		
		$data ['title'] = '大区列表 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 64; // class="current"
		
		$list ['info'] = '大区';
		$list ['total_rows'] = $this->db->count_all ( 'daqu' );
		
		$config ['page_url'] = 'daqu/daqu_list';
		$config ['page_size'] = $num;
		$config ['rows_num'] = $this->db->count_all ( 'daqu' );
		$config ['page_num'] = $page;
		$this->load->library ( 'Custom_pagination' );
		$this->custom_pagination->init ( $config );
		$list ['fenye'] = $this->custom_pagination->create_links ();
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'daqu_list', $list );
	}
	
	// =============== 大区 添加 ========================
	public function daqu_add() {
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
		
		$this->load->model ( 'Data_model' );
		
		$data ['title'] = '大区添加 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 64; // class="current"
		
		$list ['info'] = '大区';
		$list ['action'] = 'add';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'daqu_edit', $list );
	}
	
	// =============== 添加 大区 do ========================
	public function daqu_adddo() {
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
		
		// date_default_timezone_set('Asia/Shanghai');
		date_default_timezone_set ( 'Asia/Shanghai' );
		
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		
		$name =  trim(htmlspecialchars ( $this->input->post ( 'name' ) ));
		$num =  trim(htmlspecialchars ( $this->input->post ( 'num' ) ));
		$desc =  trim(htmlspecialchars ( $this->input->post ( 'desc' ) ));

		
		if ($name == '' || $num=='') {
			$status ['msg'] = '大区名或者区编号不能为空，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("大区名或者区编号不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
	
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->get_exists_data ( array (
				'num' => $num
		), 'daqu' );
		
		if ($data ['query'] > 0) {
			$status ['msg'] = '大区编号已存在，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("大区编号已存在,请换个区编号！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$data ['title'] = '大区 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 64; // class="current"
		
		$time=time();
		$post = array (
				'name' => $name,
				'num' => $num,
				'desc' => $desc,
				'create_time' => $time,
				'update_time' => $time
		);
		$this->Data_model->insert_data ( $post, 'daqu' );
		$status ['msg'] = '添加成功！';
		
		$this->load->view ( 'status', $status );
	}
	
	// =============== 大区 编辑 ========================
	public function daqu_edit($id = 1) {
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
		
		$id =  trim(htmlspecialchars ( $id ));
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'daqu' );
		
		$data ['title'] = '大区编辑 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 64; // class="current"
		
		$list ['info'] = '大区';
		$list ['action'] = 'edit';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'daqu_edit', $list );
	}
	
	// =============== 大区 编辑 do ========================
	public function daqu_editdo($id = 1) {
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
		$id =  intval(trim(htmlspecialchars ( $id )));
		
		$name =  trim(htmlspecialchars ( $this->input->post ( 'name' ) ));
		$num =  trim(htmlspecialchars ( $this->input->post ( 'num' ) ));
		$desc =  trim(htmlspecialchars ( $this->input->post ( 'desc' ) ));

		
		$data ['title'] = '大区 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 64; // class="current"
		
		$time=time();
		$post = array (
				'name' => $name,
				'num' => $num,
				'desc' => $desc,
				'update_time' => $time
		);
		
		$this->load->model ( 'Data_model' );
		$this->Data_model->update_data ( $id, $post, 'daqu' );
		
		$status ['msg'] = '编辑大区成功！';
		$this->load->view ( 'status', $status );
	}
	
	// =============== 大区 删除 ========================
	public function daqu_del($id) {
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
		$id = intval(trim(htmlspecialchars ( $id )));
		$data ['title'] = '大区删除 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 64; // class="current"
		$list ['info'] = '大区';
		
		if ($id == '') {
			$status ['msg'] = 'id不能为空！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("删除的id不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->delete_data ( $id, 'daqu' );
		$status ['msg'] = '删除成功！';
		
		$this->load->view ( 'status', $status );
	}
}
?>