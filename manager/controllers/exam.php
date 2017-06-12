<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Exam extends CI_Controller {
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

		
		redirect ( site_url ( 'kaosheng/kaosheng_add' ) );
	}
	
	/**
	 * 考试列表 start
	 */
	// =============== 考生 列表 ========================
	public function exam_list($page = 1) {
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		if ($this->session->userdata ( 'statement' ) == '') {
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
		
		$num = 20; // 每页条数
		$offset = ($page - 1) * $num;
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_data_bypage ( 'id desc', 'kaosheng', $num, $offset );
		
		$data ['title'] = '考试列表 - ';
		$data ['curbig'] = 2; // current
		$data ['cursmal'] = 22; // class="current"
		
		$list ['info'] = '考试';
		$list ['total_rows'] = $this->db->count_all ( 'kaosheng' );
		
		$config ['page_url'] = 'kaosheng/kaosheng_list';
		$config ['page_size'] = $num;
		$config ['rows_num'] = $this->db->count_all ( 'kaosheng' );
		$config ['page_num'] = $page;
		$this->load->library ( 'Custom_pagination' );
		$this->custom_pagination->init ( $config );
		$list ['fenye'] = $this->custom_pagination->create_links ();
		
		//$this->load->view ( 'menu', $data );
		$this->load->view ( 'menu_kaosheng', $data );
		$this->load->view ( 'exam_list', $list );
	}
	
	// =============== 考试 添加 ========================
	public function exam_add() {
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		if ($this->session->userdata ( 'statement' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}

		
		$this->load->model ( 'Data_model' );
		//$list['daqu']=$this->Data_model->get_data('id asc','daqu');
		//$list['school']=$this->Data_model->get_data('id asc','school');
		
		$data ['title'] = '考试添加 - ';
		$data ['curbig'] = 2; // current
		$data ['cursmal'] = 21; // class="current"
		
		$list ['info'] = '考试';
		$list ['action'] = 'add';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'exam_edit', $list );
	}
	

	// =============== 添加 考生 do ========================
	public function exam_adddo() {
		if ($this->session->userdata ( 'statement' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}

		date_default_timezone_set ( 'Asia/Shanghai' );
		
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		
		$daqu_num =  intval(trim(htmlspecialchars ( $this->input->post ( 'daqu_num' ) )));
		$name =  trim(htmlspecialchars ( $this->input->post ( 'name' ) ));
		$school_name =  trim(htmlspecialchars ( $this->input->post ( 'school_name' ) ));
		$school_name2 =  trim(htmlspecialchars ( $this->input->post ( 'school_name2' ) ));
		$sfz =  trim(htmlspecialchars ( $this->input->post ( 'sfz' ) ));
		$sex =  trim(htmlspecialchars ( $this->input->post ( 'sex' ) ));
		$birthday=  trim(htmlspecialchars ( $this->input->post ( 'birthday' ) ));
		$address=  trim(htmlspecialchars ( $this->input->post ( 'address' ) ));
		$fmqo_name=  trim(htmlspecialchars ( $this->input->post ( 'fmqo_name' ) ));
		$tel=  trim(htmlspecialchars ( $this->input->post ( 'tel' ) ));
		$photo=  trim(htmlspecialchars ( $this->input->post ( 'photo' ) ));
		
		if ($daqu_num== '' || $name=='' || $school_name=='' || $sfz=='' || $sex=='' || $birthday=='' || $address=='' || $tel=='') {
			$status ['msg'] = '请填写完整，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请填写完整！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
			
		if($school_name=='其他' && $school_name2==''){
			$status ['msg'] = '请填写学校，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请填写学校！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		if($school_name=='其他'){
			$school_name=$school_name2;
		}
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->get_exists_data ( array (
				'sfz' => $sfz
		), 'kaosheng' );
		
		if ($data ['query'] > 0) {
			$status ['msg'] = '身份证已存在，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("身份证已存在,添加失败！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$this->db->trans_start();
		$year=date('Y',time()); //年  如：2013
		$getBMList=$this->Data_model->get_wdata_bypage(array('daqu_num'=>$daqu_num),'id desc','kaosheng',0,1);

		$daquNumStr=substr('00'.$daqu_num, -2);//默认大区num
		$nowQuKSNumStr='001';  //默认大区下编号num
		
		if($getBMList){
			$maxQuKSNum=$getBMList[0]['kaosheng_num'];		
			$nowQuKSNum=$maxQuKSNum+1;			
			$nowQuKSNumStr=substr('00'.$nowQuKSNum, -3);
		}
		$bmid=$year.$daquNumStr.$nowQuKSNumStr;  //报名号
				
		$data ['title'] = '考生 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 11; // class="current"
		
		$time=time();
		$post = array (
				'daqu_num' => $daquNumStr,
				'kaosheng_num' => $nowQuKSNumStr,
				'kaosheng_no' => $bmid,
			//	'zuowei_id' => $zuowei_id,
			//	'zuowei_all_num' => $zuowei_all_num,
				'name' => $name,
				'sex' => $sex,
				'birthday' => $birthday,
				'school_name' => $school_name,
				'sfz' => $sfz,
				'address' => $address,
				'fmqo_name' => $fmqo_name,
				'tel' => $tel,
				'photo' => $photo,
				'create_time' => $time,
				'update_time' => $time
		);
		$KSId=$this->Data_model->insert_data ( $post, 'kaosheng' );		
		$this->db->trans_complete();
		
		$status ['msg'] = '添加成功,现在开始分配座位！';
		$status ['where'] = site_url("kaosheng/kaosheng_fp/".$KSId);
		
		$this->load->view ( 'status', $status );
	}
	
	// =============== 考生 编辑 ========================
	public function exam_edit($id = 1) {
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		if ($this->session->userdata ( 'statement' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		
		$id = intval(trim(htmlspecialchars ( $id )));
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'kaosheng' );
		$list['daqu']=$this->Data_model->get_data('id asc','daqu');
		$list['school']=$this->Data_model->get_data('id asc','school');
		
		$data ['title'] = '考生编辑 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 12; // class="current"
		
		$list ['info'] = '考生';
		$list ['action'] = 'edit';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'kaosheng_edit', $list );
	}
	
	// =============== 考生 编辑 do ========================
	public function exam_editdo($id = 1) {
		
		if ($this->session->userdata ( 'statement' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}

		
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		$id = intval(trim(htmlspecialchars ( $id )));
		
				
		$daqu_num =  intval(trim(htmlspecialchars ( $this->input->post ( 'daqu_num' ) )));
		$name =  trim(htmlspecialchars ( $this->input->post ( 'name' ) ));
		$school_name =  trim(htmlspecialchars ( $this->input->post ( 'school_name' ) ));
		$school_name2 =  trim(htmlspecialchars ( $this->input->post ( 'school_name2' ) ));
		$sfz =  trim(htmlspecialchars ( $this->input->post ( 'sfz' ) ));
		$sex =  trim(htmlspecialchars ( $this->input->post ( 'sex' ) ));
		$birthday=  trim(htmlspecialchars ( $this->input->post ( 'birthday' ) ));
		$address=  trim(htmlspecialchars ( $this->input->post ( 'address' ) ));
		$fmqo_name=  trim(htmlspecialchars ( $this->input->post ( 'fmqo_name' ) ));
		$tel=  trim(htmlspecialchars ( $this->input->post ( 'tel' ) ));
		$photo=  trim(htmlspecialchars ( $this->input->post ( 'photo' ) ));
		
		if ($daqu_num== '' || $name=='' || $school_name=='' || $sfz=='' || $sex=='' || $birthday=='' || $address=='' || $tel=='') {
			$status ['msg'] = '请填写完整，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请填写完整！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		if($school_name=='其他' && $school_name2==''){
			$status ['msg'] = '请填写学校，添加失败！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请填写学校！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		if($school_name=='其他'){
			$school_name=$school_name2;
		}
		$this->load->model ( 'Data_model' );		
		$time=time();
				
		$this->db->trans_start();
		$post = array (
				'school_name' => $school_name,
				'name' => $name,
				'sex' => $sex,
				'birthday' => $birthday,
				'sfz' => $sfz,
				'address' => $address,
				'fmqo_name' => $fmqo_name,
				'tel' => $tel,
				'photo' => $photo,
				'update_time' => $time
		);
		
		$KSData = $this->Data_model->get_adata ( $id, 'kaosheng' );
		$oldDaQuNum=$KSData['daqu_num'];
		$oldSchoolName=$KSData['school_name'];
		
		//如果用户修改了学生的 大区num 则重新生成报名号
		if(($daqu_num != $oldDaQuNum)){			
			
			$year=date('Y',time()); //年  如：2013
			$getBMList=$this->Data_model->get_wdata_bypage(array('daqu_num'=>$daqu_num),'id desc','kaosheng',0,1);
			
			$daquNumStr=substr('00'.$daqu_num, -2);//默认大区num
			$nowQuKSNumStr='001';  //默认大区下编号num
			
			if($getBMList){
				$maxQuKSNum=$getBMList[0]['kaosheng_num'];
				$nowQuKSNum=$maxQuKSNum+1;
				$nowQuKSNumStr=substr('00'.$nowQuKSNum, -3);
			}
			$bmid=$year.$daquNumStr.$nowQuKSNumStr;  //报名号
			
			$post = array (
					'daqu_num' => $daquNumStr,
					'kaosheng_num' => $nowQuKSNumStr,
					'kaosheng_no' => $bmid,
					//	'zuowei_id' => $zuowei_id,
					//	'zuowei_all_num' => $zuowei_all_num,
					'school_name' => $school_name,
					'name' => $name,
					'sex' => $sex,
					'birthday' => $birthday,				
					'sfz' => $sfz,
					'address' => $address,
					'fmqo_name' => $fmqo_name,
					'tel' => $tel,
					'photo' => $photo,
					'create_time' => $time,
					'update_time' => $time
			);
		}
				
		
		$data ['title'] = '考生 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 12; // class="current"
		
		$time=time();
				
		$this->Data_model->update_data ( $id, $post, 'kaosheng' );
		$this->db->trans_complete();
		
		$status ['msg'] = '编辑考生成功！';
		$this->load->view ( 'status', $status );
	}
	// =============== 准考证 打印   预览 ========================
	public function kaosheng_print_preview($id = 1) {
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
	
	
		$id = intval(trim(htmlspecialchars ( $id )));
		
		$configId = 1;		
		$this->load->model ( 'Data_model' );
		$list ['configInf'] = $this->Data_model->get_adata ( $configId, 'system' );
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'kaosheng' );
		if($list['list']['zuowei_id']==0){
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("还没有分配座位,不能打印准考证 ！");';
			echo 'window.location.href="' . site_url("kaosheng/kaosheng_fp/".$list['list']['id'].'/'.substr($list['list']['zuowei_all_num'],0,2)) . '";</script>';
			exit ();	
		}
		
		$list['daqu']=$this->Data_model->get_data('id asc','daqu');
	
		
		
		$data ['title'] = '考生打印 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 12; // class="current"
	
		$list ['info'] = '考生';
		$list ['action'] = 'edit';

		$this->load->view ( 'kaosheng_print _preview', $list );
	}
	
	// =============== 准考证 打印 ========================
	public function kaosheng_print($id = 1) {
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
	
	
		$id = intval(trim(htmlspecialchars ( $id )));
		
		$configId = 1;		
		$this->load->model ( 'Data_model' );
		$list ['configInf'] = $this->Data_model->get_adata ( $configId, 'system' );
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'kaosheng' );
		if($list['list']['zuowei_id']==0){
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("还没有分配座位,不能打印准考证 ！");';
			echo 'window.location.href="' . site_url("kaosheng/kaosheng_fp/".$list['list']['id'].'/'.substr($list['list']['zuowei_all_num'],0,2)) . '";</script>';
			exit ();			
		}
		
		$list['daqu']=$this->Data_model->get_data('id asc','daqu');
	
		
		
		$data ['title'] = '考生打印 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 12; // class="current"
	
		$list ['info'] = '考生';
		$list ['action'] = 'edit';

		$this->load->view ( 'kaosheng_print', $list );
	}
	
	//考生座位分配
	public function kaosheng_fp($id,$kaochang_num=1){
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		$systemConfigId=1;
		
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$id = intval(trim(htmlspecialchars ( $id )));
		$kaochang_num= intval(trim(htmlspecialchars ( $kaochang_num )));
		if($kaochang_num<1){
			$kaochang_num=1;
		}
		
		$this->load->model ( 'Data_model' );
		$list ['list'] = $this->Data_model->get_adata ( $id, 'kaosheng' );
		$list['daqu']=$this->Data_model->get_data('id asc','daqu');
		$list['kaochang']=$this->Data_model->get_adata ( $systemConfigId, 'system' );
		$list['kaochang_count']=$list['kaochang']['kaochang_count'];
		$list['per_num']=$list['kaochang']['per_kaochang_zuowei_count'];
		$list['kaosheng_id']=$id;
		$list['kaochang_num']=$kaochang_num;
		
		if(!$list ['list']){
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("不存在该考生 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$list['zuowei']=$this->Data_model->getZuoWeiListByKCNum($kaochang_num,$id);
					
		
		$data ['title'] = '座位编辑 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 12; // class="current"
		
		$list ['info'] = '座位';
		$list ['action'] = 'edit';
		
		$this->load->view ( 'menu', $data );
		$this->load->view ( 'zuowei_fp_edit', $list );
		
		
		
		
	}
	
	public function kaosheng_fp_do($id,$zwid){
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$id = intval(trim(htmlspecialchars ( $id )));
		$zwid= intval(trim(htmlspecialchars ( $zwid )));
		
		
		$this->load->model ( 'Data_model' );
		$this->db->trans_start();
		$KSData= $this->Data_model->get_adata ( $id, 'kaosheng' );  //考生数据
		$ZWData= $this->Data_model->get_adata ( $zwid, 'zuowei' );  //新的座位数据
		
		
		if($ZWData['kaosheng_id']>0){
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("该座位已经分配给别人用了 ！");';
			echo 'window.location.href="' . site_url ( 'kaosheng/index' ) . '";</script>';
			exit ();
		}
		$time=time();

		if($KSData['zuowei_id']>0){  //如果已经分配过了座位的考生  再次选择座位  清空以前选择的座位
			$OldZWData=$this->Data_model->get_adata ( $ZWData['zuowei_id'], 'zuowei' );  //新的座位数据
			$postOldZW=array(
					'kaosheng_id'=>0,
					'kaosheng_no'=>'',
					'update_time'=>$time
			);
			$this->Data_model->update_data ($KSData['zuowei_id'], $postOldZW, 'zuowei' );
		}
			
		$postZW=array(
				'kaosheng_id'=>$KSData['id'],
				'kaosheng_no'=>$KSData['kaosheng_no'],
				'update_time'=>$time
		);
		
		$postKS=array(
				'zuowei_id'=>$ZWData['id'],
				'zuowei_part'=>$ZWData['part'],
				'zuowei_all_num'=>$ZWData['zuowei_all_num'],
				'update_time'=>$time
		);
		$this->Data_model->update_data ( $zwid, $postZW, 'zuowei' );
		$this->Data_model->update_data ( $id, $postKS, 'kaosheng' );
		
		$this->db->trans_complete();
		
		$status ['msg'] = '分配座位成功！';
		$status ['where'] = site_url("kaosheng/kaosheng_print_preview/".$id);		
		$this->load->view ( 'status2', $status );
		
	}
	
	// =============== 考生 删除 ========================
	public function exam_del($id) {
		if ($this->session->userdata ( 'statement' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		if ($this->session->userdata ( 'statement' ) != '0') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("您没有此操作权限 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
		$status ['where'] = $_SERVER ['HTTP_REFERER']; // 来源地址
		$id = intval(trim(htmlspecialchars ( $id )));
		$data ['title'] = '考生删除 - ';
		$data ['curbig'] = 1; // current
		$data ['cursmal'] = 12; // class="current"
		$list ['info'] = '考生';
		
		if ($id == '') {
			$status ['msg'] = 'id不能为空！';
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("删除的id不能为空！");';
			echo 'window.location.href="' . $status ['where'] . '";</script>';
			exit ();
		}
		
		$this->load->model ( 'Data_model' );
		$data ['query'] = $this->Data_model->delete_data ( $id, 'kaosheng' );
		$status ['msg'] = '删除成功！';
		
		$this->load->view ( 'status', $status );
	}
	
	
	
	public function exportall() {
		if ($this->session->userdata ( 'manage_role' ) == '') {
			header ( "Content-Type:text/html;charset=utf-8" );
			echo '<script>alert("请登录 ！");';
			echo 'window.location.href="' . site_url ( 'index' ) . '";</script>';
			exit ();
		}
		
	
		$this->load->model ( 'Data_model' );
		$list  = $this->Data_model->get_data( 'id desc', 'kaosheng' );
	
		$fileName=date('Y-m-d_His').'.xls';
	
		require_once(dirname(__FILE__).'/phpexcel/PHPExcel.php');//加载PHPExcel
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition:attachment; filename=".$fileName);
		header('Cache-Control: max-age=0');
		$objPHPExcel = new PHPExcel();
		// Set properties
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'id');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', '大区编号');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', '报名号');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', '考试时段');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', '座位编号');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', '姓名');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', '性别');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', '出生年月');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', '毕业学校');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', '身份证');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', '家庭住址');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', '父母姓名');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', '联系电话');
	
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT); //设置为文本格式
	
		$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('J1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
	
	
		$i=2;
		foreach($list as $key=>$val){	
			if($val['sex']=='1'){$sex='男';}elseif($val['sex']=='0'){$sex='女';}else{$sex=$val['sex'];}
			if($val['zuowei_part']=='1'){$zuowei_part='上午';}elseif($val['zuowei_part']=='2'){$zuowei_part='下午';}else{$zuowei_part=$val['zuowei_part'];}
					
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, ' '.$val['id']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, ' '.$val['daqu_num']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, ' '.$val['kaosheng_no']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, $zuowei_part);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, ' '.$val['zuowei_all_num']);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, ' '.$val['name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, ' '.$sex);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, ' '.$val['birthday']);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, ' '.$val['school_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, ' '.$val['sfz']);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, ' '.$val['address']);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, ' '.$val['fmqo_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, ' '.$val['tel']);	
			$i++;
		}
	
	
		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
		$objWriter->save('php://output');//输出到浏览器
		exit;
	}
}
?>