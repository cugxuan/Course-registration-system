  <div id="main-content">
 
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo $info;?>列表</h3>
		
		<div align="right" style="padding-top:15px; padding-right:20px;"><h5><a href="<?php echo site_url("daqu/daqu_add");?>" class="default-tab">添加<?php echo $info;?></a></h5></div>
        <div class="clear"></div>
      </div>
     
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">          
          
          <table>
            <thead>
              <tr>
                
                <th width="133">id</th>
                <th width="175">区名</th>	
				<th width="175">区编号</th>
				<th width="175">区描述</th>			
                <th width="127">操作</th>
              </tr>
            </thead>
            
            <tbody>
<?php foreach ($list as $item){?>
		
<tr>                
<td><?php echo $item['id'];?></td>
<td><a href="<?php echo site_url("daqu/daqu_edit/".$item['id']);?>" title="<?php echo $item['name'];?>"><?php echo $item['name'];?></a></td>

<td><?php echo $item['num'];?></td>
<td><?php echo $item['desc'];?></td>
<td><a href="<?php echo site_url("daqu/daqu_edit/".$item['id']);?>" title="编辑"><img src="<?php echo base_url();?>public/images/admin/images/icons/pencil.png" alt="编辑" /></a>&nbsp;&nbsp; <a href="<?php echo site_url("daqu/daqu_del/".$item['id']);?>" title="删除" onclick="javascript:return confirm('确认删除？');"><img src="<?php echo base_url();?>public/images/admin/images/icons/cross.png" alt="删除" /></a>  </td>
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