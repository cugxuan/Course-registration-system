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
  <?php if($action=='add'){echo '添加';}else{echo '编辑';} ?> <?php echo $info;?>
</center></h2>
<form action="<?php if($action=='add'){echo site_url("kaosheng/kaosheng_adddo/");}else{echo site_url("kaosheng/kaosheng_editdo/".$list['id']);} ?>" method="post" id="form" class="form">

<fieldset>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php if($action!=add){
            ?>
        <tr>
          <td>考生号 : </td>
          <td><input class="text-input" type="text" id="id" name="id" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['id'])){echo $list['id'];}
			} ?>" <?php if($action=='add'){}else{
			if(isset($list['id'])){echo 'disabled="disabled" ';}
			}?> />(即学号，如： 20151003756)</td>
		
          <td>密码 : </td>
          <td><input class="text-input" type="text" id="password" name="password" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['password'])){echo '密码不可编辑';}
			} ?>" <?php if($action=='add'){}else{
			if(isset($list['id'])){echo 'disabled="disabled" ';}
			}?>/></td>
        </tr>

        <?php }  else{
            ?>
        <tr>
          <td>考生号 : </td>
          <td><input class="text-input" type="text" id="id" name="id" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['id'])){echo $list['id'];}
			} ?>" <?php if($action=='add'){}else{
			if(isset($list['id'])){echo 'disabled="disabled" ';}
			}?> />(即学号，如： 20151003756)</td>
		
          <td>密码 : </td>
          <td><input class="text-input" type="text" id="password" name="password" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['password'])){echo '密码不可编辑';}
			} ?>" <?php if($action=='add'){}else{
			if(isset($list['id'])){echo 'disabled="disabled" ';}
			}?>/></td>
        </tr>
		<?php }?>
		
		<tr>
          <td>姓名 : </td>
          <td><input class="text-input" type="text" id="name" name="name" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['name'])){echo $list['name'];}
			} ?>" /></td>
          <td>身份证号  :          </td>
          <td><input class="text-input" type="text" id="credit_card" name="credit_card" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['credit_card'])){echo $list['credit_card'];}
			} ?>" /></td>
        </tr>
		
        <tr>
          <td>性别 : </td>
          <td><select name="sex" id="sex">	
			  <option value="1"   <?php if($action=='add'){}else{
			if($list['sex']=='1'){echo 'selected';}}?>>男</option>
			   <option value="0"   <?php if($action=='add'){}else{
			if($list['sex']=='0'){echo 'selected';}}?>>女</option>
			</select></td>
          <td>联系电话  :          </td>
          <td><input class="text-input" type="text" id="phone" name="phone" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['phone'])){echo $list['phone'];}
			} ?>" /></td>
        </tr>
        
        <tr>
          <td>所在地 :           </td>
          <td><input class="text-input" type="text" id="local" name="local" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['local'])){echo $list['local'];}
			} ?>" /></td>
          <td>           </td>
          <td class="text-input"></td>
        </tr>
      
      </table>

	  <p align="center">
              <input class="button" type="submit" value2="<?php if($action=='add'){echo '添加'.$info;}else{echo '编辑'.$info;} ?>" />
            </p>
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