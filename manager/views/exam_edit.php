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
        <tr>
          <td>考试编号 : </td>
          <td><input class="text-input" type="text" id="id" name="id" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['name'])){echo $list['name'];}
			} ?>" /></td>
          <td>科目: </td>
          <td><input class="text-input" type="text" id="course" name="course" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['name'])){echo $list['name'];}
			} ?>" /></td>
        </tr>
		<tr>
          <td>起始时间 : </td>
          <td><input class="text-input" type="text" id="stime" name="stime" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['name'])){echo $list['name'];}
			} ?>" />(如201706171000)</td>
          <td>终止时间  :          </td>
          <td><input class="text-input" type="text" id="etime" name="etime" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['sfz'])){echo $list['sfz'];}
			} ?>" />(如201706171200)</td>
        </tr>
		
        <tr>
          <td>地点 : </td>
          <td><input class="text-input" type="text" id="pos" name="pos" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['tel'])){echo $list['tel'];}
			} ?>" /></td>
          <td>人数容量 :          </td>
          <td><input class="text-input" type="text" id="capacity" name="capacity" size="40" value="<?php if($action=='add'){}else{
			if(isset($list['tel'])){echo $list['tel'];}
			} ?>" /></td>
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
$("#school_name").chained("#daqu_num");

$(function()
{
	$("#school_name").change(function(){
		 if($("#school_name").val()=="其他"){
			$("#school_name2").show();
		 }else{
		 $("#school_name2").hide();
		 }
	
	});

	$("form").submit(function()
	{
		
	  if($("#daqu_num").val()==""){
		 alert("请选择大区！");
	  	$("#daqu_num").focus();
	 	 return false;		
	 }
	  if($("#school_name").val()==""){
		 alert("请选择学校！");
	  	$("#school_name").focus();
	 	 return false;		
	 }
	 
	 if($("#school_name").val()=="其他" && $("#school_name2").val()==""){
		  alert("请填写学校！");
			$("#school_name2").focus();
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
	 
	 if($("#birthday").val()==""){
		 alert("请输入出生年月！");
	  	$("#birthday").focus();
	 	 return false;		
	 }
	 
	  if($("#sfz").val()==""){
		 alert("请输入身份证！");
	  	$("#sfz").focus();
	 	 return false;		
	 }
	 
	  if($("#address").val()==""){
		 alert("请输入家庭住址！");
	  	$("#address").focus();
	 	 return false;		
	 }
	 
	if($("#fmqo_name").val()==""){
		 alert("请输入父母姓名！");
	  	$("#fmqo_name").focus();
	 	 return false;		
	 } 
	 
	 if($("#tel").val()==""){
		 alert("请输入电话号码！");
	  	$("#tel").focus();
	 	 return false;		
	 } 
	 
	 
			
	});
	
	//return true;
});


</script>


</body>
</html>