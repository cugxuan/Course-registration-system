<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center><?php echo 修改公告栏信息;?></center></h2>
<form action="<?php echo site_url('admin/edit_info_do/'); ?>" method="post" id="form" >
            <fieldset>
            <div>
            	<span class="gg button" style="background: red url(../images/bg-button-green.gif) top left repeat-x !important;">公告1</span>
            	<div class="str" style="display: none">			
					<textarea  id="str1" name="str1"  cols="20" rows="10"><?php if(isset($str1))  {echo $str1;}?>
					</textarea>
				</div>
			</div>
			<div>
				<span class="gg button" style="background: red url(../images/bg-button-green.gif) top left repeat-x !important;">公告2</span>
				<div class="str" style="display: none">
					<textarea   id="str2" name="str2"  cols="20" rows="10"><?php if(isset($str2))  {echo $str2;}?>
					</textarea>
				</div>
			</div>	
			
             <input class="button" type="submit" value="提交修改" />
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
</div>
		
		</div>
		
		
		</div>
		</div>
<script type="text/javascript">
	$(function(){
		var txt;
		$('.gg').click(function(){
			$(this).next('.str').toggle();
		})
	})
</script>

</body>
</html>