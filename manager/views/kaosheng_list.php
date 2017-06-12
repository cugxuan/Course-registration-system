  <div id="main-content">
 
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo $info;?>列表</h3>
		
		<div align="right" style="padding-top:15px; padding-right:20px;"><h5><a href="<?php echo site_url("kaosheng/kaosheng_add");?>" class="default-tab" target="_blank">添加<?php echo $info;?></a></h5></div>
        <div class="clear"></div>
      </div>
     
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">          
          
          <table>
            <thead>
              <tr>
                
                <!-- <th width="5%">id</th> -->
                <th width="10%">考生号</th>
				<th width="10%">姓名</th>
				<th width="15%">身份证号</th>
				<th width="5%">性别</th>
				<th width="15%">联系电话</th>
				<th width="15%">所在地</th>
				<th width="25%">操作</th>
              </tr>
            </thead>
            
            <tbody>
<?php foreach ($list as $item){?>
		
<tr>                
<td><?php echo $item['id'];?></td>
<td><a href="<?php echo site_url("kaosheng/kaosheng_edit/".$item['id']);?>" title="<?php echo $item['name'];?>"><?php echo $item['name'];?></a></td>
<!-- <td><?php echo $item['name'];?></td> -->
<td><?php echo $item['credit_card'];?></td>
<td><?php if($item['sex']=='1'){echo '男';}elseif($item['sex']=='0'){echo '<font color=red>女</font>';}else{echo $item['sex'];}?></td>
<td><?php echo $item['phone'];?></td>
<td><?php echo $item['local'];?></td>
<td>
<a href="<?php echo site_url("kaosheng/kaosheng_edit/".$item['id']);?>" title="编辑" target="_blank">编辑</a>&nbsp;&nbsp; 
<!--<a href="<?php echo site_url("kaosheng/kaosheng_fp/".$item['id'].'/'.substr($item['zuowei_all_num'],0,2));?>" title="重新分配" target="_blank">重新分配</a>&nbsp;&nbsp; 
<a href="<?php echo site_url("kaosheng/kaosheng_print/".$item['id']);?>" title="打印准考证" target="_blank">打印准考证</a>&nbsp;&nbsp; -->

<?php
		if($this->session->userdata('statement')=='0'){
		?>&nbsp;&nbsp; <a href="<?php echo site_url("kaosheng/kaosheng_del/".$item['id']);?>" title="删除" onclick="javascript:return confirm('确认删除？');"><img src="<?php echo base_url();?>public/images/admin/images/icons/cross.png" alt="删除" /></a>
		<?php
		 }
		 ?>
</td>
</tr>
<?php }?>
			  
			  
            </tbody>
			
			
			<tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left"></div>
                  
				 
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
			
          </table>
        </div>
        <!-- End #tab1 -->
		
		<div class="pagination">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fenye;?>
		</div>
		
		
      </div>
      
    </div><br />

    <div class="clear"></div>
	
    <div id="footer"> </div>
   
  </div>
 
  
  
</div>
</body>
</html>