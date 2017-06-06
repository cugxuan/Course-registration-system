<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo $list['truename'];?></title>
<style>
html ,body {
    padding:0px;
	margin:0;
	font:12px Tahoma, Arial, Helvetica, sans-serif;
	color:#333;
	line-height:20px;	
}
body, ul, dl, dd, p, h1, h2, h3, h4, h5, h6, form, fieldset {
	margin: 0; 
	padding: 0; 
}
body{ background:url(bg.gif) repeat #9B9B9B; padding-top:16px}
li { 
	list-style: none;
}
img {
	border:0;
}
a{
   color:#333399;
   text-decoration:none;
}
a:hover{
   color:#ff6600;
   text-decoration:underline;
}
form{
    padding: 0;
    margin: 0;
}
input,select,textarea{
	font:12px Tahoma, Arial, Helvetica, sans-serif;
	vertical-align:middle;
	color:#333;
	
}
select{}

input,textarea{
	border:1px solid #ccc;
	border-top:1px solid #999;
	border-left:1px solid #999;
	background:#fff;
	padding:3px;	
}
input{
	
}
input[type="checkbox"]{ background:none;border:none}
input.w_time{ width:120px;}
input.w_day{ width:70px;}
img{
    vertical-align:middle;
}
hr{
	height:1px;
	border-top:1px solid #ccc;
	margin:10px 0;
}
.min{
	width:14px;	
}
.clear{ clear:both; font-size:0; height:0; line-height:0}

.top{ width:890px; height:128px; margin:0 auto; }
.nav{ background:url(nav.png) no-repeat; width:890px; height:36px; margin:8px auto 0 auto; text-align:center}
.nav a{ margin:0 20px; color:#fff; font:bold 16px/36px '微软雅黑','黑体',Tahoma,Geneva;}
.nav a:hover{ text-decoration:underline}
.main{ background: url(main_bg.jpg) top center no-repeat #fff;width:866px; margin:10px auto 4px auto; padding:16px 12px 8px}
.content{ border:#0B8DD9 dashed 1px; min-height:400px; padding:8px 20px 20px}
.footer{ background:#0378BB; padding:20px; text-align:center; line-height:24px; color:#fff;}
.c_left{ float:left; width:450px}
.c_right{ float:right;width:326px}
.start_sign{  padding:12px; text-align:center}
.news{ margin-bottom:20px}
.news ul{ padding:5px 10px}
.news ul li{ background:url(list.gif) 4px 11px no-repeat; border-bottom:#ccc dotted 1px; line-height:26px; text-indent:14px}
.news ul li:hover{ background:url(list.gif) 4px 11px no-repeat #FFFFCC}
.news ul li a{ color:#333;}
.news ul li span.date{ float:right; color:#666;}
.login{ background:url(title04.jpg) left top no-repeat; padding-top:40px}
.login .login_block{ border:#ccc solid 1px; padding:5px}
.tishi{ padding:8px 14px; border:#E1F1F8 solid 1px; border-top:none; margin-top:0px;}
h1{
	font:bold 26px/36px '微软雅黑','黑体',Tahoma,Geneva;
	text-align:center;
	padding-bottom:10px;
	font-size: 20px;
}
h2{ font:bold 20px/40px '微软雅黑','黑体',Tahoma,Geneva; text-align:center; color:#FF0000;}

.table { 
	border: 2px solid #B1B6D2;
	background: #fff;  
	empty-cells: show; 
	border-collapse: collapse; 
	margin-bottom:5px;
	text-align:left;
	width:100%;
}
.table td { 
	padding:6px;
	border: 1px solid #CECFDA; 
}
.table th { 
	border: 0 solid #CECFDA; 
	background: #6D73A5 url("title_bg.gif"); 
	padding:4px 15px;
	font-weight:bold;
	color:#fff;
	font-size:12px;
	
}
.table th a{ 
	color:#fff;
}
.submit{ text-align:center}
.red{ color:#f00}
.success_info{ width:480px; margin:0 auto; border:#ccc dashed 1px; padding:12px 20px; font-size:14px; line-height:26px;}
.border01{ border-left:#ccc solid 1px;border-top:#ccc solid 1px; margin-bottom:10px}
.border01 td{border-right:#ccc solid 1px;border-bottom:#ccc solid 1px;}

.user_left{ padding:12px;}
.user_left li{ line-height:28px; font-size:14px; border:#ccc solid 1px; text-align:center; margin-bottom:4px}
.user_left li:hover{ background:#fff;}
.time{ color:#666; text-align:center; line-height:40px;}
/*----------------------------page------------------------------*/
.page{
	font-size:12px;
	text-align:center;
	background:#f7f7f7;
	line-height:30px;
}
.page a{
	display:inline;
	padding:4px 7px;
}
.page a:hover{
	background:#DADDEC;
	text-decoration:none;
}
.p{
	border:1px solid #A4A6C2;
	padding:4px 7px;
	background:#fff;
}
.curpage{
	border:1px solid #A4A6C2;
	padding:4px 7px;
	background:#DADDEC;
	text-decoration:none;
	font-weight:bold;
}
/*----------------------------other------------------------------*/
}
/*----------------------------other------------------------------*/
.luqu{ padding:5px; font-size:14px; font-weight:bold; border:#ccc solid 1px; text-align:center; margin:10px 10px 0 10px; color:#06C}

body{ background:none;}
</style>
</head>

<body>
<div style=" margin-top:0px;" >
   <h1>安徽邮电职业技术学院2013年自主招生考生报名表</h1>
   <p>报考号：<?php  echo $list['bmid'];?></p>
  <div>
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
      <tr>
        <td width="28%">姓名&nbsp;</td>
        <td width="22%"><?php  echo $list['truename'];?></td>
        <td width="12%">性别</td>
        <td width="19%"><?php  if($list['sex']==1){echo '男';}else{echo '女';}?></td>
        <td width="19%" rowspan="4" align="center"> 请帖相片</td>
      </tr>
      <tr>
        <td>政治面貌</td>
        <td><?php  if($list['zz_mianmao']==1){echo '共青团员';}elseif($list['zz_mianmao']==2){echo '共产党员';}elseif($list['zz_mianmao']==3){echo '其他';}elseif($list['zz_mianmao']==4){echo '无';}?></td>
        <td>民族</td>
        <td><?php  echo $list['minzu'];?></td>
      </tr>
      <tr>
        <td>出生年月</td>
        <td><?php  echo $list['birthday'];?></td>
        <td>健康状况</td>
        <td><?php  echo $list['jiankang'];?></td>
      </tr>
      <tr>
        <td>身份证号</td>
        <td colspan="3"><?php  echo $list['sfz'];?></td>
      </tr>
      <tr>
        <td>高考报名号/对口高考报名号</td>
        <td colspan="4"><?php  echo $list['gaokao_dbmid'];?></td>
      </tr>
      <tr>
        <td>学科类别</td>
        <td colspan="2"><?php  echo $list['xk_leibie'];?></td>
        <td>考生类别</td>
        <td><?php  echo $list['ks_leibie'];?></td>
      </tr>
      <tr>
        <td>专业志愿</td>
        <td colspan="4"> 第一志愿:
          
          <label for="01"> <?php  if($list['1st_zy']==1){echo '呼叫中心服务与管理';}elseif($list['1st_zy']==2){echo '无线网络优化';}elseif($list['1st_zy']==3){echo '通信线路（光纤通信方向）';}?></label> 
          第二志愿:
        <label for="032"><?php  if($list['2st_zy']==1){echo '呼叫中心服务与管理';}elseif($list['2st_zy']==2){echo '无线网络优化';}elseif($list['2st_zy']==3){echo '通信线路（光纤通信方向）';}?></label></td>
      </tr>
      <tr>
        <td>是否服从专业调剂</td>
        <td colspan="4"><?php  if($list['isfucong']==1){echo '是';}elseif($list['isfucong']==0){echo '否';}?></td>
      </tr>
      <tr>
        <td>毕业学校</td>
        <td colspan="4"><?php  echo $list['by_school'];?></td>
      </tr>
      <tr>
        <td>班主任</td>
        <td colspan="2"><?php  echo $list['by_bzr'];?></td>
        <td>班主任联系方式</td>
        <td><?php  echo $list['bzr_lianxi'];?></td>
      </tr>
      <tr>
        <td>所在县（区）</td>
        <td colspan="4"><?php  echo $list['xianqu'];?></td>
      </tr>
      <tr>
        <td>家长姓名</td>
        <td colspan="2"><?php  echo $list['jiazhang_name'];?></td>
        <td>家长联系方式</td>
        <td><?php  echo $list['jiazhang_lianxi'];?></td>
      </tr>
      <tr>
        <td>有何特长</td>
        <td colspan="4"><?php  echo $list['techang'];?></td>
      </tr>
      <tr>
        <td>通知书邮寄地址</td>
        <td colspan="4"><?php  echo $list['tzs_mail_address'];?></td>
      </tr>
      <tr>
        <td>收件人姓名</td>
        <td colspan="2"><?php  echo $list['reciver_name'];?></td>
        <td>邮编</td>
        <td><?php  echo $list['zip'];?></td>
      </tr>
      <tr>
        <td>本人联系电话</td>
        <td colspan="4"><?php  echo $list['tel'];?></td>
      </tr>
      <tr>
        <td>证明人</td>
        <td colspan="4"><?php  echo $list['zmr'];?></td>
      </tr>
      <tr>
        <td>考生承诺<span class="red">*</span></td>
        <td height="60" colspan="4" >一、本人所提供的个人报名信息真实准确。
          二、本人在考试中自觉遵守《考生守则》和考场纪律。
          三、本人在报名、考试中，如有违纪舞弊行为，愿接受《国家教育考试违规处理办法》规定的处理。&nbsp; <b>考生签名：</b>     </td>
      </tr>
      <tr>
        <td>所在学校（单位）推荐意见<span class="red">（请盖学校公章）*</span></td>
        <td height="50" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td>资格审查意见<span class="red">*</span></td>
        <td height="40" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td>申请加分项目（另附表格） <br /></td>
        <td height="40" colspan="4"> X年X月 XX市教育局颁发XX市&quot;三好学生&quot;称号 ；证明人：XXX<br /></td>
      </tr>
    </table>
	  
  </div>
</div>
</body>
</html>