<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center>
  <?php if($action=='add'){echo '添加';}else{echo '编辑';} ?> <?php echo $info;?>
</center></h2>
<form action="<?php if($action=='add'){echo site_url("school/school_adddo/");}else{echo site_url("school/school_editdo/".$list['id']);} ?>" method="post" id="form" class="form">
            <fieldset>
				<p><label>所属片区:</label>
			  <select name="daqu_num" id="daqu_num">	
			  <?php 			  
			 foreach($daqu as $k=>$v){
			  ?>	
			  <option value="<?php echo $v['num'];?>"   <?php if($action=='add'){}else{
			if($list['daqu_num']==$v['num']){echo 'selected';}}?>><?php echo $v['name'];?></option>
			    <?php 			  
			 }
			  ?>	
			</select>
			 	</p>
			
						
			<p><label>学校名称:</label>
			<input class="text-input" type="text" id="school_name" name="school_name" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['school_name'])){echo $list['school_name'];}
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
		
	  if($("#daqu_num").val()==""){
		 alert("请选择大区！");
	  	$("#daqu_num").focus();
	 	 return false;		
	 }
		
	
	if($("#school_name").val()==""){
		 alert("请输入学校名！");
	  	$("#school_name").focus();
	 	 return false;		
	 }
		
			
	});
	
	//return true;
});


</script>


</body>
</html>