  <div id="main-content">

    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>欢迎来到注册界面</h3>
		
		<div align="right" style="padding-top:15px; padding-right:20px;"><h5></h5>
		</div>
        <div class="clear"></div>
      </div>
     
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">          
          
          <table>
            <tbody>
<tr>
<td> <span style="font-size:16px; color:#FF0000; font-weight:500;">亲爱的考生，你好！</span>

<?php
$p=0;
switch($manage_role){
case "1":
   $p=1;break;
case "2":
  $p=2;break; 
  case "3":
   $p=3;break; 
   case "10":
  $p=10;break; 
}
?>
<br />
    <br /><br />
			<?php  if($p==1){echo '<font color=red>';}?>1.请点击左侧的考生注册来填写并提交<?php  if($p==1){echo '</font>';}?><br /><br />

			<?php  if($p==10){echo '<font color=red>';}?>2.已有考试安排如下<?php  if($p==10){echo '</font>';}?><br /><br /><br />
			
			<h5 style="color:#FF0000">提示：如果您遇到了问题，请联系网站管理员-Xuan(QQ:179562600)！</h5>
			</td>
</tr>
            </tbody>
			
			
			<tfoot>
              <tr>
                <td>
                  <div class="bulk-actions align-left"></div>
                
                  <div class="clear"></div>                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- End #tab1 -->
		
		<div class="pagination">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		
		
      </div>
      
    </div><br />

    <div class="clear"></div>
	
    <div id="footer"></div>
   
  </div>
 
  
  
</div>
</body>
</html>