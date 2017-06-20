<script src="<?php echo base_url();?>public/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>public/js/jquery.chained.js" type="text/javascript"></script> 

<link rel="stylesheet" href="<?php echo base_url();?>editor/kindeditor/themes/default/default.css" />  
<script charset="utf-8" src="<?php echo base_url();?>editor/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo base_url();?>editor/kindeditor/lang/zh_CN.js"></script>
<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '<?php echo base_url();?>editor/kindeditor/php/upload_json.php?dir=image',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#photo').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});
		</script>

<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center>
  <?php echo $info;?>
</center></h2>
<form id="form" class="form">

<fieldset>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>考生号 : </td>
          <td><?php echo $list['id'];?></td>
		   
		  <td>密码 : </td>
          <td><?php echo 密码不可见;?></td>
        </tr>
        <tr>
          <td>姓名 : </td>
          <td><?php echo $list['name']?></td>
          <td>身份证号  :</td>
          <td><?php echo $list['credit_card']?></td>
        </tr>
		
        <tr>
          <td>性别 : </td>
          <td>  <?php if($list['sex']=='0'){echo 男;}else{echo 女;}?></td>
          <td>联系电话  :</td>
          <td><?php echo $list['phone'];?></td>
        </tr>
        
        <tr>
          <td>所在地 :</td>
          <td><?php echo $list['local'];?></td>
          <td></td>
          <td></td>
        </tr>
      
      </table>
</fieldset>
			  

            <div class="clear"></div>
            <!-- End .clear -->
          </form>
</div>
	
	
	<br />
	<!--<?php if($action=='add'){}else{
		?>		
		<div> <input type="button" name="button1" id="button1" value="分配座位" onclick="window.location.href='<?php echo site_url("kaosheng/kaosheng_fp/".$list['id'].'/'.substr($list['zuowei_all_num'],0,2));?>';" style="width:100px; height:50px;"  />
	&nbsp;&nbsp;&nbsp;&nbsp;
	 <input type="button" name="button2" id="button2" value="打印准考证" onclick="window.location.href='<?php echo site_url("kaosheng/kaosheng_print_preview/".$list['id']);?>';"  style="width:100px; height:50px;"   />
	</div>
	<?php	} ?>-->
		
		</div>
		
		
		</div>
		</div>
		
		
		
		
		</div>
<script language="javascript" type="text/javascript"> 
//$("#school_name").chained("#daqu_num");

/*$(function()
{
	$("#school_name").change(function(){
		 if($("#school_name").val()=="其他"){
			$("#school_name2").show();
		 }else{
		 $("#school_name2").hide();
		 }
	
	});*/

	$("form").submit(function()
	{
		
	  if($("#id").val()==""){
		 alert("请输入考生号（学号）！");
	  	$("#id").focus();
	 	 return false;		
	 }
	  if($("#password").val()==""){
		 alert("请输入密码！");
	  	$("#password").focus();
	 	 return false;		
	 }
	 if($("#name").val()==""){
		 alert("请输入学生姓名！");
	  	$("#name").focus();
	 	 return false;		
	 }
		 
	 if($("#sex").val()==""){
		 alert("请选择性别！");
	  	$("#sex").focus();
	 	 return false;		
	 }
	 
	 if($("#credit_card").val()==""){
		 alert("请输入身份证号！");
	  	$("#credit_card").focus();
	 	 return false;		
	 }
	 
	  if($("#phone").val()==""){
		 alert("请输入手机号！");
	  	$("#phone").focus();
	 	 return false;		
	 }
	 
	  if($("#local").val()==""){
		 alert("请输入所在地！");
	  	$("#local").focus();
	 	 return false;		
	 }
	 
	 
			
	});
	
	//return true;
});


</script>


</body>
</html>