<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Admin extends CI_Controller {
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
		
		redirect ( site_url ( 'admin/admin_add' ) );
	}
	
	/**
	 * 管理员列表 start
	 */
	// =============== 管理员 列表 ========================
	public function admin_list($page = 1) {
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
		$list ['list'] = $this->Data_model->get_data_bypage ( 'id desc', 'admin', $num, $offset );
		
		$data ['title'] = '管理员列表 - ';
		$data ['curbig'] = 5; // current
		$data ['cursmal'] = 52; // class="current"
		
		$list ['info'] = '管理员';
		$list ['total_rows'] = $this->db->count_all ( 'admin' );
		
		$config ['page_url'] = 'inf/admin_list';
		$config ['page_size'] = $num;
		$config ['rows_num'] = $this->db->count_all ( 'admin' );
		$config ['page_num'] = $page;
		$this->load->library ( 'Custom_pagination' );
		$this->custom_pagination->init ( $config );
		$list ['fenye'] = $this->custom_pagination->create_links ();
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'admin_list', $list );
	}
	
	// =============== 管理员 添加 ========================
	public function admin_add() {
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
		
		$data ['title'] = '管理员添加 - ';
		$data ['curbig'] = 5; // current
		$data ['cursmal'] = 51; // class="current"
		
		$list ['info'] = '管理员';
		$list ['action'] = 'add';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'admin_edit', $list );
	}
	
	// =============== 添加 管理员 do ========================
	public function admin_adddo() {
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
		
		$manage_name =  trim(htmlspecialchars ( $this->input->post ( 'manage_name' ) ));
		$manage_password =  trim(htmlspecialchars ( $this->input->post ( 'manage_password' ) ));
		$manage_truename =  trim(htmlspecialchars ( $this->input->post ( 'manage_truename' ) ));
		$manage_isstop =  trim(htmlspecialchars ( $this->input->post ( 'manage_isstop' ) ));

		$manage_role =  trim(htmlspecialchars ( $this->input->post ( 'manage_role' ) ));

		
		if ($manage_name == '') {
			$status ['msg'] = '用户名不能为空，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("标题不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->get_exists_data ( array (
				'manage_name' => $manage_name 
		), 'admin' );
		
		if ($data ['query'] > 0) {
			$status ['msg'] = '用户名存在，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("用户名存在,请换个用户名！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$data ['title'] = '管理员 - ';
		$data ['curbig'] = 5; // current
		$data ['cursmal'] = 51; // class="current"
		
		$post = array (
				'manage_name' => $manage_name,
				'manage_password' => md5 ( md5 ( $manage_password ) ),
				'manage_truename' => $manage_truename,
				'manage_isstop' => $manage_isstop,
				'manage_role' => $manage_role 
		);
		
		$this->Data_model->insert_data ( $post, 'admin' );
		$status ['msg'] = '添加成功！';
		
		$this->load->view ( 'status', $status );
	}
	
	// =============== 管理员 编辑 ========================
	public function admin_edit($id = 1) {
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
		$list ['list'] = $this->Data_model->get_adata ( $id, 'admin' );
		
		$data ['title'] = '管理员编辑 - ';
		$data ['curbig'] = 5; // current
		$data ['cursmal'] = 52; // class="current"
		
		$list ['info'] = '管理员';
		$list ['action'] = 'edit';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'admin_edit', $list );
	}
	
	// =============== 管理员 编辑 do ========================
	public function admin_editdo($id = 1) {
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
		$id =  trim(htmlspecialchars ( $id ));
		
		// $manage_name=htmlspecialchars($this->input->post('manage_name'));
		$manage_password = trim(htmlspecialchars ( $this->input->post ( 'manage_password' ) ));
		$manage_truename = htmlspecialchars ( $this->input->post ( 'manage_truename' ) );
		$manage_isstop = trim(htmlspecialchars ( $this->input->post ( 'manage_isstop' ) ));

		$manage_role =  trim(htmlspecialchars ( $this->input->post ( 'manage_role' ) ));

		
		$data ['title'] = '管理员 - ';
		$data ['curbig'] = 5; // current
		$data ['cursmal'] = 52; // class="current"
		
		if (! empty ( $manage_password )) {
			$post = array (
					'manage_password' => md5 ( md5 ( $manage_password ) ),
					'manage_truename' => $manage_truename,
					'manage_isstop' => $manage_isstop,
					'manage_role' => $manage_role 
			);
		} else {
			$post = array (
					'manage_truename' => $manage_truename,
					'manage_isstop' => $manage_isstop,
					'manage_role' => $manage_role 
			);
		}
		
		$this->load->model ( 'Data_model' );
		$this->Data_model->update_data ( $id, $post, 'admin' );
		
		$status ['msg'] = '编辑管理员成功！';
		$this->load->view ( 'status', $status );
	}
	
	// =============== 管理员 删除 ========================
	public function admin_del($id) {
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
		$id = trim(htmlspecialchars ( $id ));
		$data ['title'] = '管理员删除 - ';
		$data ['curbig'] = 5; // current
		$data ['cursmal'] = 52; // class="current"
		$list ['info'] = '管理员';
		
		if ($id == '') {
			$status ['msg'] = 'id不能为空！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("删除的id不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->delete_data ( $id, 'admin' );
		$status ['msg'] = '删除成功！';
		
		$this->load->view ( 'status', $status );
	}
}
?>