<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Index extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct ();
	}
	public function index() {
		// $this->load->helper('url');
		$this->load->view ( 'login' );
	}
	
	public function random() {
		$vcodes = null;
		session_start ();
		// 生成验证码图片
		Header ( "Content-type: image/PNG" );
		$im = imagecreate ( 50, 18 );
		$back = ImageColorAllocate ( $im, 245, 245, 245 );
		imagefill ( $im, 0, 0, $back ); // 背景
	
		srand ( ( double ) microtime () * 1000000 );
		// 生成4位数字
		for($i = 0; $i < 5; $i ++) {
			$font = ImageColorAllocate ( $im, rand ( 100, 255 ), rand ( 0, 100 ), rand ( 100, 255 ) );
			$authnum = rand ( 1, 9 );
			$vcodes .= $authnum;
			imagestring ( $im, 5, 2 + $i * 10, 1, $authnum, $font );
		}
	
		for($i = 0; $i < 100; $i ++) 		// 加入干扰象素
		{
			$randcolor = ImageColorallocate ( $im, rand ( 0, 255 ), rand ( 0, 255 ), rand ( 0, 255 ) );
			imagesetpixel ( $im, rand () % 70, rand () % 30, $randcolor );
		}
		ImagePNG ( $im );
		ImageDestroy ( $im );	
		$_SESSION['vcode']=$vcodes;
	}
	
	
	public function login() {
		date_default_timezone_set ( 'Asia/Shanghai' );
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		
		$manage_name = trim(htmlspecialchars ( $this->input->post ( 'username' ) ));
		$manage_password = trim(htmlspecialchars ( $this->input->post ( 'password' ) ));
		$yzm = trim(htmlspecialchars ( $this->input->post ( 'yzm' ) ));
				
		if ($yzm != $_SESSION['vcode']) {
			$status ['msg'] = '验证码错误！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("验证码错误！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		if ($manage_name == '' || $manage_password == '') {
			$status ['msg'] = '用户名或者密码不能为空，登陆失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("用户名或者密码不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->get_exists_data ( array (
				'manage_name' => $manage_name,
				'manage_password' => md5 ( md5 ( $manage_password ) ),
				'manage_isstop' => 0 
		), 'admin' );
		
		if ($data ['query'] == 0) {
			$status ['msg'] = '用户名或者密码错误，登录失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("用户名或者密码错误 , 请检查输入值！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$data = $this->Data_model->get_login ( array (
				'manage_name' => $manage_name,
				'manage_password' => md5 ( md5 ( $manage_password ) ),
				'manage_isstop' => 0 
		), 'admin' );
		
		$this->Data_model->update_data ( $data ['id'], array (
				'login_count' => $data ['login_count'] + 1,
				'last_ip' => $this->input->ip_address (),
				'last_login_time' => time () 
		), 'admin' );
		
		$this->session->set_userdata ( 'manage_name', $data ['manage_name'] );
		$this->session->set_userdata ( 'manage_truename', $data ['manage_truename'] );
		$this->session->set_userdata ( 'manage_role', $data ['manage_role'] );
		
		redirect ( site_url ( 'index/manage' ) );
	}
	
	public function register(){
	    echo 123;
	}
	
	
	public function manage() {
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$data ['title'] = '系统管理 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 0; // class="current"
		
		$list ['manage_name'] = $this->session->userdata ( 'manage_name' );
		$list ['manage_truename'] = $this->session->userdata ( 'manage_truename' );
		$list ['manage_role'] = $this->session->userdata ( 'manage_role' );
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'manage', $list );
	}
	public function logout() {
		$this->session->unset_userdata ( 'manage_name' );
		$this->session->unset_userdata ( 'manage_truename' );
		$this->session->unset_userdata ( 'manage_role' );
		
		header ( "Content-Type:text/html;charset=utf-8" );
		echo '<script>alert("成功退出登录！");';
		echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
		exit ();
	}
}
