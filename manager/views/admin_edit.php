<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center>
  <?php if($action=='add'){echo '添加';}else{echo '编辑';} ?> <?php echo $info;?>
</center></h2>
<form action="<?php if($action=='add'){echo site_url("admin/admin_adddo/");}else{echo site_url("admin/admin_editdo/".$list['id']);} ?>" method="post" id="form" class="form">
            <fieldset>
				<p><label>用户名:</label>
			<input class="text-input" type="text" id="manage_name" name="manage_name" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['manage_name'])){echo $list['manage_name'];}
			}?>" <?php if($action=='add'){}else{
			if(isset($list['manage_name'])){echo 'disabled="disabled" ';}
			}?>  /></p>
			
			
			<p><label>密码:</label>
		<input class="text-input" type="password" id="manage_password" name="manage_password" size="40" value="" />(不修改请留空)</p>
			<p><label>重复密码:</label>
		<input class="text-input" type="password" id="rmanage_password" name="rmanage_password" size="40" value="" />
			
						
			<p><label>真实姓名:</label>
			<input class="text-input" type="text" id="manage_truename" name="manage_truename" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['manage_truename'])){echo $list['manage_truename'];}
			} ?>" /></p>
			
			 <p><label>是否停用:</label>
			  <select name="manage_isstop" id="manage_isstop">		
			    <option value="0" <?php if($action=='add'){}else{
			if($list['manage_isstop']=='0'){echo 'selected';}}?>>正常</option>
				 <option value="1" <?php if($action=='add'){}else{
			if($list['manage_isstop']=='1'){echo 'selected';}}?>>停用</option>
			</select>（是否停用，选择“停用”则不能登录）
			 	</p>
			 
			
				
			  <p><label>管理权限:</label>
		 <select name="manage_role" id="manage_role">		
			    <option value="1" <?php if($action=='add'){}else{
			if($list['manage_role']==1){echo 'selected';}}?>>招生人员</option>				
				 <option value="10" <?php if($action=='add'){}else{
			if($list['manage_role']==10){echo 'selected';}}?>>超级管理员</option>
			</select><br />
			
			</p>
			  
            <p>
              <input class="button" type="submit" value="<?php if($action=='add'){echo '添加'.$info;}else{echo '编辑'.$info;} ?>" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
</div>
		
		</div>
		
		
		</div>
		</div>
		
		
		
		
		</div>
<script language="javascript" type="text/javascript">


$(function()
{
	$("form").submit(function()
	{
		
	  if($("#manage_name").val()==""){
		 alert("请输入用户名！");
	  	$("#manage_name").focus();
	 	 return false;		
	 }
		
		  if($("#manage_password").val()!=""&&$("#rmanage_password").val()!=$("#manage_password").val()){
		 alert("两次输入密码不同！");
	  	$("#manage_password").focus();
	 	 return false;		
	 }
		
			
	});
	
	//return true;
});


</script>


</body>
</html>