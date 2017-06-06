<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center>
  <?php if($action=='add'){echo '添加';}else{echo '编辑';} ?> <?php echo $info;?>
</center></h2>
<form action="<?php if($action=='add'){echo site_url("systemc/system_do/");}else{echo site_url("systemc/system_do/".$list['id']);} ?>" method="post" id="form" class="form">
            <fieldset>
			
			
			<p><label>考场总数:</label>
			<input class="text-input" type="text" id="kaochang_count" name="kaochang_count" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['kaochang_count'])){echo $list['kaochang_count'];}
			} ?>" /></p>
			
			
			<p><label>每个考场座位数量:</label>
			<input class="text-input" type="text" id="per_kaochang_zuowei_count" name="per_kaochang_zuowei_count" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['per_kaochang_zuowei_count'])){echo $list['per_kaochang_zuowei_count'];}
			} ?>" /></p>
			
			
			<p><label>系统名称:</label>
			<input class="text-input" type="text" id="sys_title" name="sys_title" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['sys_title'])){echo $list['sys_title'];}
			} ?>" /></p>
			
            <p>
              <input class="button" type="submit" value="<?php if($action=='add'){echo '添加'.$info;}else{echo '修改'.$info;} ?>" />
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
		
	  if($("#kaochang_count").val()==""){
		 alert("请输入考场总数！");
	  	$("#kaochang_count").focus();
	 	 return false;		
	 }
	   if($("#per_kaochang_zuowei_count").val()==""){
		 alert("请输入每个考场座位数量！");
	  	$("#per_kaochang_zuowei_count").focus();
	 	 return false;		
	 }
		 if($("#sys_title").val()==""){
		 alert("请输入系统名称！");
	  	$("#sys_title").focus();
	 	 return false;		
	 }
			
	});
	
	//return true;
});

</script>


</body>
</html>