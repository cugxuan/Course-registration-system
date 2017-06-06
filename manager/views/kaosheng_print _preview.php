<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>准考证打印预览</title>
<link href="<?php echo base_url();?>public/images/print/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background:#FFF
}
</style>
</head>

<body style="background:#f1f7fa">
<div id="contentWrap">
	
  <div id="widget table-widget">
  	<div id="main-title">准考证打印预览</div>
    <div id="main-content">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          <table  border="0" align="center" cellpadding="0" cellspacing="0" class="zkz">
              <tr>
                <td width="139" height="110" rowspan="2">&nbsp;</td>
                <td height="57" colspan="2" valign="bottom"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="21%">&nbsp;</td>
                    <td width="79%"><?php echo $configInf['sys_title'];?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td width="167" height="53">&nbsp;</td>
                <td width="134" rowspan="5" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo $list['photo'];?>" alt="" width="101" height="131" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="29">&nbsp;</td>
                <td><?php echo $list['kaosheng_no'];?></td>
              </tr>
              <tr>
                <td height="29">&nbsp;</td>
                <td><?php echo $list['name'];?></td>
              </tr>
              <tr>
                <td height="29">&nbsp;</td>
                <td><?php echo $list['school_name'];?></td>
              </tr>
              <tr>
                <td height="29">&nbsp;</td>
                <td><?php echo $list['zuowei_all_num'];?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top"><table width="100%" height="27" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="38%" align="center"><?php echo substr($list['zuowei_all_num'],0,2);?></td>
                    <td width="27%" align="center"><?php echo substr($list['zuowei_all_num'],2,2);?></td>
                    <td width="35%" align="center">&nbsp;</td>
                    </tr>
                </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                     <td>6月2日  &nbsp;&nbsp;<?php 
					if($list['zuowei_part']==1){
						echo '上午8:20';
					}elseif($list['zuowei_part']==2){
						echo '下午2:30';
					}?></td>
                    </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>

          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="btn">
        <tr>
          <td><label>
            <input type="button" name="button" id="button" value="打印准考证" onClick="window.location.href='<?php echo site_url("kaosheng/kaosheng_print/".$list['id']);?>';"   style="width:100px; height:50px;"   />
          </label></td>
        </tr>
      </table>
    </div>
  </div><!-- #widget -->
</div>


</body>
</html>
