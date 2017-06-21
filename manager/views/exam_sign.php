 <div id="main-content">
 
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo $info;?>列表</h3>
		
		<div align="right" style="padding-top:15px; padding-right:20px;">
		</div>
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
<!-- 开始循环遍历所有的考试 -->
<?php foreach ($list as $item){?>		
<tr>
<td><?php echo $item['id'];?></td>
<td><?php echo $item['subject']?></td>
<td><?php echo $item['start_time'];?></td>
<td><?php echo $item['deadline'];?></td>
<td><?php echo $item['location'];?></td>
<td><?php echo $item['capacity'];?></td>
<td><?php echo $item['number'];?></td>
<td>

<!-- 如果发现已经报名。则显示已报名 -->
<?php 
$this->load->model ( 'Data_model' );
$data ['query'] = $this->Data_model->get_exists_data ( array (
		'id' => $this->session->userdata('id'),
		'exam_id' => $item['id'],
), 'student_exam' );
if($data['query']>0){
	echo 已报名;
}else{?>
<!-- 未报名则可以报名 -->
<a href="<?php echo site_url("exam/exam_signdo/".$item['id']);?>"
 title="报名">报名</a>&nbsp;&nbsp;
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