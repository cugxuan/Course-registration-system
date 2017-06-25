<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center><?php echo 修改公告栏信息;?></center></h2>
<form action="<?php echo site_url('admin/edit_info_do/'); ?>" method="post" id="form" class="form">
            <fieldset>
            						
			<textarea id="str1" name="str1"  cols="20" rows="10"><?php if(isset($str1))  {echo $str1;}?>
			</textarea>
			
			<textarea id="str2" name="str2"  cols="20" rows="10"><?php if(isset($str2))  {echo $str2;}?>
			</textarea>
			
             <input class="button" type="submit" value="提交修改" />
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
</div>
		
		</div>
		
		
		</div>
		</div>
		</div>


</body>
</html>