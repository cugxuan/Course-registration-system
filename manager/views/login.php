<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>
<link rel="stylesheet" href="<?php echo base_url();?>public/images/admin/css/reset.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo base_url();?>public/images/admin/css/style.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?php echo base_url();?>public/images/admin/css/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/jquery-1.3.2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/simpla.jquery.configuration.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/facebox.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/images/admin/scripts/jquery.wysiwyg.js"></script>
</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <!-- Logo (221px width) --><table width="200" border="0">
  <!--<tr>
    <td><img id="logo" src="<?php echo base_url();?>public/images/admin/images/logo2.png" alt="Admin logo" /></td>
  </tr>--!>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

     </div>
  <!-- End #logn-top -->
  <div id="particles-js">
  <div id="login-content">
    <form action="<?php echo site_url("index/login");?>" method="post" id="login"  name="login">
      <div class="notification information png_bg">
        <div> 请输入用户名和密码 </div>
      </div>
      <p>
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户名:</label>
        <input class="text-input" type="text" name="username" id="username" />
      </p>
      <div class="clear"></div>
      <p>
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密 码:</label>
        <input class="text-input" type="password" name="password" id="password" />
      </p>
	  <div class="clear"></div>
	    <p>
		<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;验证码:</label>
   <input name="yzm" type="text" class="text-input" id="yzm" size="10" maxlength="5" />
    <div style="position:relative; left:320px; top:0px;"><img src="<?php echo site_url('index/random');?>" border="0" width="50" height="26" onclick="this.src='<?php echo site_url('index/random');?>?'+Math.random();"  style="position: absolute;left: -12px;top:0px;" /></div>
      </p>
      <div class="clear"></div>
      <div class="clear"></div>
      <p align="middle">
        <input class="button" type="submit" value="登 录" />
        <a href="<?php echo site_url("index/register");?>"  class="button" style="margin-top: 20px;height: 17px;">注册</a> 
      </p>
    </form>
  </div>
  
</div>
<script language="javascript" type="text/javascript">


$(function()
{
	$("form").submit(function()
	{
		
	  if($("#username").val()==""){
		 alert("请输入用户名！");
	  	$("#username").focus();
	 	 return false;		
	 }
	   if($("#password").val()==""){
		 alert("请输入密码！");
	  	$("#password").focus();
	 	 return false;		
	 }
		 if($("#yzm").val()==""){
		 alert("请输入验证码！");
	  	$("#yzm").focus();
	 	 return false;		
	 }
			
	});
	
	//return true;
});

</script>
</body>
</html>