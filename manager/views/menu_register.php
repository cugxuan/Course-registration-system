<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?> 考生注册</title>
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
     
      <h1 id="sidebar-title">考生注册</h1>
      <!-- Logo (221px wide) -->
      <img id="logo" src="<?php echo base_url();?>public/images/admin/images/register.png" alt="Simpla Admin logo" />
     
      <div id="profile-links"> 请填写考生信息 <?php echo $this->session->userdata('manage_name');?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
        <br />
        <a href="<?php echo site_url('index');?>" title="系统首页">首页</a> |  &nbsp; </div>
      <ul id="main-nav">
        <!--  Menu  Start -->

		    <li> <a href="javascript:void(0);" class="nav-top-item <?php if($curbig==1){echo '  current';}?>"> 考生注册 </a>
          <ul>
          	 <li><a href="<?php echo site_url("/index/register");?>" <?php if($cursmal==11){echo ' class="current"';}?>>考生须知</a></li>             
	         <li><a href="<?php echo site_url("kaosheng/kaosheng_add");?>" <?php if($cursmal==12){echo ' class="current"';}?>">添加考生</a></li>
			
          </ul>
        </li>
				  	
      </ul>
      <!-- End #main-nav -->
      
	  
    </div>
  </div>
  <!-- End #sidebar -->