<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class School extends CI_Controller {
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
		
		redirect ( site_url ( 'school/school_add' ) );
	}
	
	/**
	 * 学校列表 start
	 */
	// =============== 学校 列表 ========================
	public function school_list($page = 1) {
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
		$list ['list'] = $this->Data_model->get_data_bypage ( 'id desc', 'school', $num, $offset );
		
		$data ['title'] = '学校列表 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 65; // class="current"
		
		$list ['info'] = '学校';
		$list ['total_rows'] = $this->db->count_all ( 'school' );
		
		$config ['page_url'] = 'school/school_list';
		$config ['page_size'] = $num;
		$config ['rows_num'] = $this->db->count_all ( 'school' );
		$config ['page_num'] = $page;
		$this->load->library ( 'Custom_pagination' );
		$this->custom_pagination->init ( $config );
		$list ['fenye'] = $this->custom_pagination->create_links ();
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'school_list', $list );
	}
	
	// =============== 学校 添加 ========================
	public function school_add() {
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
		$list['daqu']=$this->Data_model->get_data('id asc','daqu');
		
		$data ['title'] = '学校添加 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 65; // class="current"
		
		$list ['info'] = '学校';
		$list ['action'] = 'add';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'school_edit', $list );
	}
	
	// =============== 添加 学校 do ========================
	public function school_adddo() {
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
		
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		
		$daqu_num =  trim(htmlspecialchars ( $this->input->post ( 'daqu_num' ) ));
		$school_name =  trim(htmlspecialchars ( $this->input->post ( 'school_name' ) ));

		
		if ($daqu_num == '' || $school_name=='') {
			$status ['msg'] = '学校名或者所属大区不能为空，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("学校名或者所属大区不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}	
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->get_exists_data ( array (
				'school_name' => $school_name
		), 'school' );
		
		if ($data ['query'] > 0) {
			$status ['msg'] = '学校已存在，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("学校已存在,请换个学校！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$data ['title'] = '学校 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 65; // class="current"
		
		$time=time();
		$post = array (
				'daqu_num' => $daqu_num,
				'school_name' => $school_name,
				'create_time' => $time,
				'update_time' => $time
		);
		$this->Data_model->insert_data ( $post, 'school' );
		$status ['msg'] = '添加成功！';
		
		$this->load->view ( 'status', $status );
	}
	
	// =============== 学校 编辑 ========================
	public function school_edit($id = 1) {
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
		
		$id =  intval(trim(htmlspecialchars ( $id )));
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'school' );
		$list['daqu']=$this->Data_model->get_data('id asc','daqu');
		
		$data ['title'] = '学校编辑 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 65; // class="current"
		
		$list ['info'] = '学校';
		$list ['action'] = 'edit';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'school_edit', $list );
	}
	
	// =============== 学校 编辑 do ========================
	public function school_editdo($id = 1) {
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
		
		$daqu_num =  trim(htmlspecialchars ( $this->input->post ( 'daqu_num' ) ));
		$school_name =  trim(htmlspecialchars ( $this->input->post ( 'school_name' ) ));

		
		if ($daqu_num == '' || $school_name=='') {
			$status ['msg'] = '学校名或者所属大区不能为空，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("学校名或者所属大区不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}	
		
		$data ['title'] = '学校 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 65; // class="current"
		
		$time=time();
		$post = array (
				'daqu_num' => $daqu_num,
				'school_name' => $school_name,
				'update_time' => $time
		);
		
		$this->load->model ( 'Data_model' );
		$this->Data_model->update_data ( $id, $post, 'school' );
		
		$status ['msg'] = '编辑学校成功！';
		$this->load->view ( 'status', $status );
	}
	
	// =============== 学校 删除 ========================
	public function school_del($id) {
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
		$data ['title'] = '学校删除 - ';
		$data ['curbig'] = 6; // current
		$data ['cursmal'] = 65; // class="current"
		$list ['info'] = '学校';
		
		if ($id == '') {
			$status ['msg'] = 'id不能为空！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("删除的id不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->delete_data ( $id, 'school' );
		$status ['msg'] = '删除成功！';
		
		$this->load->view ( 'status', $status );
	}
}
?>