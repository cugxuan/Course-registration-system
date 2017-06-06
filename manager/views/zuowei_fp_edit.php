
<div id="main-content">
 <div class="content-box">

 <div class="content-box-content">
 
<div class="tab-content default-tab" id="tab2">
<h2><center>
  分配座位
</center></h2>


 <fieldset>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right">选择考场</td>
          <td align="left">第<select name="kaochang_num" id="kaochang_num" onchange="window.location.href='<?php echo str_replace('.html','',site_url ( 'kaosheng/kaosheng_fp/'.$kaosheng_id.'/' )); ?>/'+this.value;">
		  <?php
		  for($i=1;$i<=$kaochang_count;$i++){
		  ?>
            <option value="<?php echo $i;?>"  <?php  if($i==$kaochang_num){ ?>selected="selected" <?php  }?>><?php echo $i;?></option>
          <?php
		  }
		  ?>
		  </select>考场</td>
        </tr>
       <tr> 
		<td colspan="2">
	
	<table width="100%" border="1" cellspacing="1" cellpadding="1">
<?php
//$per_num 必须能被5整除
$per_row_num=5;
$row_num=$per_num/$per_row_num;
$p=0;
 for($i=1;$i<=$row_num;$i++){
?>
<tr>

<?php
for($j=1;$j<=$per_row_num;$j++){
?>
    <td bgcolor=""><table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td bgcolor="<?php  if($zuowei[$p]['kid']==$kaosheng_id){echo '#FF5096';}else{echo '#B6E7FC';} ?>">
	<?php echo  $zuowei[$p]['zzuowei_all_num'];?>&nbsp;&nbsp;上午<br />
	<?php echo  $zuowei[$p]['kkaosheng_no'];?>&nbsp;&nbsp;<?php echo  $zuowei[$p]['kname'];?><br />
	<?php echo  $zuowei[$p]['kschool_name'];?>
	<?php  if(($zuowei[$p]['kid'] == 0) ){
	?>
	<input type="button" name="buttonS" id="buttonS" value="分配座位"  onclick="if(confirm('确认分配使用  上午<?php echo $zuowei[$p]['zzuowei_all_num'];?> 该座位？')){window.location.href='<?php echo site_url( 'kaosheng/kaosheng_fp_do/'.$kaosheng_id.'/' .$zuowei[$p]['zid']);?>';}" />
	<?php 
	} ?>
	
	
	
	<?php	
	$p++;
	?>
	&nbsp;
	</td>
  </tr>

  <tr>
    <td bgcolor="<?php  if($zuowei[$p]['kid']==$kaosheng_id){echo '#FF5096';}else{echo '#B6E7FC';} ?>">
	<?php echo  $zuowei[$p]['zzuowei_all_num'];?>&nbsp;&nbsp;下午<br />
	<?php echo  $zuowei[$p]['kkaosheng_no'];?>&nbsp;&nbsp;<?php echo  $zuowei[$p]['kname'];?><br />
	<?php echo  $zuowei[$p]['kschool_name'];?>
	<?php  if($zuowei[$p]['kid'] ==0){
	?>
	<input type="button" name="buttonS" id="buttonS" value="分配座位"  onclick="if(confirm('确认分配使用  下午<?php echo $zuowei[$p]['zzuowei_all_num'];?> 该座位？')){window.location.href='<?php echo site_url( 'kaosheng/kaosheng_fp_do/'.$kaosheng_id.'/' .$zuowei[$p]['zid']);?>';}" />
	<?php 
	} ?>
	&nbsp;</td>
  </tr>
</table>
</td>

<?php
$p++;
}
?>
	
  </tr>
<?php
}
?>	
	
  
  
  
</table>

	
	
		</td>
		</tr>
      </table>



 </fieldset>
			  
			
            <div class="clear"></div>
            <!-- End .clear -->
         
</div>
		
		</div>
		
		
		</div>
		</div>
		
		
		
		
		</div>



</body>
</html>