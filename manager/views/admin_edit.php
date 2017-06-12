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
			<input class="text-input" type="text" id="id" name="id" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['id'])){echo $list['id'];}
			}?>" <?php if($action=='add'){}else{
			if(isset($list['id'])){echo 'disabled="disabled" ';}
			}?>  /></p>
			
			
			<p><label>密码:</label>
		<input class="text-input" type="password" id="password1" name="password1" size="40" value="" />(不修改请留空)</p>
			<p><label>重复密码:</label>
		<input class="text-input" type="password" id="password2" name="password2" size="40" value="" />
			
						
			<p><label>姓名:</label>
			<input class="text-input" type="text" id="name" name="name" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['name'])){echo $list['name'];}
			} ?>" /></p>
				
			  <p><label>管理权限:</label>
		 <select name="statement" id="statement">		
			    <option value="1" <?php if($action=='add'){}else{
			if($list['statement']==1){echo 'selected';}}?>>招生人员</option>				
				 <option value="0" <?php if($action=='add'){}else{
			if($list['statement']==0){echo 'selected';}}?>>超级管理员</option>
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
		
	  if($("#id").val()==""){
		 alert("请输入用户名！");
	  	$("#id").focus();
	 	 return false;		
	 }
		
		  if($("#password1").val()!=""&&$("#password1").val()!=$("#password2").val()){
		 alert("两次输入密码不同！");
	  	$("#password1").focus();
	 	 return false;		
	 }
		
			
	});
	
	//return true;
});


</script>


</body>
</html>