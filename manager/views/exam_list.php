  <div id="main-content">
 
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo $info;?>列表</h3>
		
		<div align="right" style="padding-top:15px; padding-right:20px;"><h5>
		<?php if($this->session->userdata('statement')==2){}else{?>
		<a href="<?php echo site_url("exam/exam_add");?>" class="default-tab">添加<?php echo $info;?></a>
		<?php }?> </h5></div>
        
        <div class="clear"></div>
      </div>
     
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">          
          
          <table>
            <thead>
              <tr>
                <th width="20%">考试编号</th>
                <th width="10%">科目</th>
                <th width="15%">起始时间</th>
                <th width="15%">终止时间</th>
                <th width="10%">地点</th>
                <th width="5%">人数容量</th>
                <th width="10%">已选人数</th>
                <th width="25%">操作</th>
              </tr>
            </thead>
            
            <tbody>
<?php foreach ($list as $item){?>
<tr>
<td><?php echo $item['id'];?></td>
<td><?php if($this->session->userdata('statement')!=2){?>
<a href="<?php echo site_url("exam/exam_edit/".$item['id']);?>" title="<?php echo $item['subject'];?>"><?php echo $item['subject'];?></a>
<?php }else{ echo $item['subject'];}?></td>
<td><?php echo $item['start_time'];?></td>
<td><?php echo $item['deadline'];?></td>
<td><?php echo $item['location'];?></td>
<td><?php echo $item['capacity'];?></td>
<td><?php if($this->session->userdata('statement')!=2){?>
<a href="<?php echo site_url("exam/exam_kaosheng_list/".$item['id']);?>" title="<?php echo $item['number'];?>"><?php echo $item['number'];?></a></td>
<?php }else{ echo $item['number'];}?></td>
<td>
<!--<a href="<?php echo site_url("kaosheng/kaosheng_fp/".$item['id'].'/'.substr($item['zuowei_all_num'],0,2));?>" title="重新分配" target="_blank">重新分配</a>&nbsp;&nbsp; 
<a href="<?php echo site_url("exam/exam_print/".$item['id']);?>" title="打印准考证" target="_blank">打印准考证</a>&nbsp;&nbsp; -->

<?php
		if($this->session->userdata('statement')==2){
		?><a href="<?php echo site_url("exam/exam_withdrew/".$item['id']);?>" title="删除"
		 onclick="javascript:return confirm('确认退选？');">退选</a>
		<?php }else{?>
		 <a href="<?php echo site_url("exam/exam_del/".$item['id']);?>" title="删除"
		 onclick="javascript:return confirm('确认删除？');">删除考试</a>
		 <?php }?>
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
</body>
</html>