<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center>
  <?php if($action=='add'){echo '添加';}else{echo '编辑';} ?> <?php echo $info;?>
</center></h2>
<form action="<?php if($action=='add'){echo site_url("daqu/daqu_adddo/");}else{echo site_url("daqu/daqu_editdo/".$list['id']);} ?>" method="post" id="form" class="form">
            <fieldset>
			<p><label>大区名:</label>
			<input class="text-input" type="text" id="name" name="name" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['name'])){echo $list['name'];}
			} ?>" /></p>
			
					 <p><label>区编号:</label>
			<input class="text-input" type="text" id="num" name="num" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['num'])){echo $list['num'];}
			} ?>" /></p>			
			
			   <p><label>区描述:</label>
			<input class="text-input" type="text" id="desc" name="desc" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['desc'])){echo $list['desc'];}
			} ?>" /></p>		
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
		
	  if($("#name").val()==""){
		 alert("请输入大区名！");
	  	$("#name").focus();
	 	 return false;		
	 }
		 if($("#num").val()==""){
		 alert("请输入区编号！");
	  	$("#num").focus();
	 	 return false;		
	 }
		 
	 if($("#desc").val()==""){
		 alert("请输入区描述！");
	  	$("#desc").focus();
	 	 return false;		
	 }
			
	});
	
	//return true;
});


</script>


</body>
</html>