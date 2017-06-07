<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?> 后台管理中心</title>
<!--  CSS   -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>public/images/admin/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>public/images/admin/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?php echo base_url();?>public/images/admin/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/simpla.jquery.configuration.js"></script>

<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/facebox.js"></script>

<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/jquery.wysiwyg.js"></script>

<!-- jQuery Datepicker Plugin -->
<!--<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/jquery.date.js"></script>-->

</head>
<body>

// <?php
// 		if($this->session->userdata('manage_role')==''){
// 			echo '<script>alert("请登录 ！");';
// 			echo 'window.location.href="'.site_url('index').'";</script>';
// 			exit;	
// 		}
// 		?>
<div id="body-wrapper">
 
  <div id="sidebar">
    <div id="sidebar-wrapper">
     
      <h1 id="sidebar-title"></h1>
      <!-- Logo (221px wide) -->
      <img id="logo" src="<?php echo base_url();?>public/images/admin/images/logo.png" alt="Simpla Admin logo" />
     
      <div id="profile-links"> 你好,  <?php echo $this->session->userdata('manage_name');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
        <br />
        <a href="<?php echo site_url('index/manage');?>" title="后台首页">后台首页</a> |  &nbsp;<a href="<?php echo site_url('index/logout');?>" title="退出登录">退出登录</a> </div>
      <ul id="main-nav">
        <!--  Menu  Start -->
        <?php
		if($this->session->userdata('manage_role')=='1' || $this->session->userdata('manage_role')=='10'){
		?>
		    <li> <a href="javascript:void(0);" class="nav-top-item <?php if($curbig==1){echo '  current';}?>"> 考生管理 </a>
          <ul>
         <li><a href="<?php echo site_url("kaosheng/kaosheng_add");?>" <?php if($cursmal==11){echo ' class="current"';}?> target="_blank">添加考生</a></li>
            <li><a href="<?php echo site_url("kaosheng/kaosheng_list");?>" <?php if($cursmal==12){echo ' class="current"';}?>>考生管理</a></li>			
			 <!--<li><a href="<?php echo site_url("zuowei/zuowei_list");?>" <?php if($cursmal==13){echo ' class="current"';}?>>座位管理</a></li>-->
			 <li><a href="<?php echo site_url("kaosheng/exportall");?>" <?php if($cursmal==14){echo ' class="current"';}?> target="_blank">导出考生</a></li>              
			
          </ul>
        </li>
		
		<?php
		}
		?>
		  	
      
		 	
		
		<?php
		if($this->session->userdata('manage_role')=='10'){
		?>
        <li> <a href="javascript:void(0);" class="nav-top-item <?php if($curbig==5){echo '  current';}?>"> 管理员管理 </a>
          <ul>
            <li><a href="<?php echo site_url("admin/admin_add");?>" <?php if($cursmal==51){echo ' class="current"';}?>>添加管理员</a></li>
            <li><a href="<?php echo site_url("admin/admin_list");?>" <?php if($cursmal==52){echo ' class="current"';}?>>管理员管理</a></li>
          </ul>
        </li>
		
		
		 <li> <a href="javascript:void(0);" class="nav-top-item <?php if($curbig==6){echo '  current';}?>"> 系统设置 </a>
          <ul>
            <li><a href="<?php echo site_url("systemc/index");?>" <?php if($cursmal==62){echo ' class="current"';}?>>系统设置</a></li>
			<li><a href="<?php echo site_url("systemc/init_system");?>" <?php if($cursmal==63){echo ' class="current"';}?>>初始化系统</a></li>			
			<!--<li><a href="<?php echo site_url("daqu/daqu_list");?>" <?php if($cursmal==64){echo ' class="current"';}?>>大区管理</a></li>-->
			<!--<li><a href="<?php echo site_url("school/school_list");?>" <?php if($cursmal==65){echo ' class="current"';}?>>学校管理</a></li>-->
          </ul>
        </li>
		
		<?php
		 }
		 ?>
      </ul>
      <!-- End #main-nav -->
      
	  
    </div>
  </div>
  <!-- End #sidebar -->