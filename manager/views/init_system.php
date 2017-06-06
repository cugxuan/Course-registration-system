<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center>
  <?php if($action=='add'){echo '添加';}else{echo '编辑';} ?> <?php echo $info;?>
</center></h2>
<form action="<?php if($action=='add'){echo site_url("systemc/init_system_do/");}else{echo site_url("systemc/init_system_do/");} ?>" method="post" id="form" class="form">
            <fieldset>									
            <p>
              <input class="button" type="submit" value="系统初始化" onclick="return confirm('确认系统初始化？\n  初始化后系统数据将全部丢失！');" />
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


</body>
</html>