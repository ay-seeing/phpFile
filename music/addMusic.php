<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加音乐</title>
	<link rel="stylesheet" type="text/css" href="music.css">
</head>
<body>
<?php 
// 打开数据库
$conn=mysql_connect("localhost","root","");
// 链接数据表
mysql_select_db("phpstudy",$conn);
// 设置编码
mysql_query("set names 'utf8'");
// 获取文件路径和名称
// echo __FILE__;
// 获取文件路径不包含名称
// echo dirname(__FILE__);
// 获取文件名称
// echo basename(__FILE__);
// 获取文件名称,但去除后缀名
// echo basename(__FILE__, '.php');
// echo dirname(dirname(__FILE__)); 

if(isset($_POST["musicTitle"])){
	$str = "insert into `phpstudy`.`musiclist` (`id`,`title`,`fileurl`,`regdate`,`remark`) values ('','$_POST[musicTitle]','$_POST[musicUrl]',now(),'$_POST[musicTitle]')";
	$oks=mysql_query($str,$conn);
	// if($oks){echo "<script>alert('插入成功');</script>";}
	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	// 页面重定向，防止刷新页面重新提交数据
	echo "<script language=\"javascript\">";
	echo "location.href=\"http://$url\"";
	echo "</script>";
	mysql_close($conn);
	exit;
}
mysql_close($conn);

?>
<div class="addMusic">
	<h2 class="h2">添加音乐数据</h2>
	<form method="post" id="musicFrom" action="addMusic.php">
		<div class="title"><input type="text" autofocus="" name="musicTitle" id="music_title" placeholder="音乐名称"></div>
		<div class="url"><input type="text" name="musicUrl" id="music_url" placeholder="音乐地址"></div>
		<div class="btn"><input type="button" id="musit_submit" class="submit" value="提交" /></div>
	</form>
</div>
<script type="text/javascript">
var oMusicTitle = document.getElementById("music_title");
var oMusicUrl = document.getElementById("music_url");
var oMusicFrom = document.getElementById("musicFrom");
var oMusitSubmit = document.getElementById("musit_submit");
oMusitSubmit.onclick=function(){
	var strTitle= oMusicTitle.value.trim();
	var strUrl= oMusicUrl.value.trim();
	if(/.*[\u4e00-\u9fa5]+.*$/.test(strUrl)){
		alert("地址不能包含中文");
		return false;
	}
	if(strUrl.length > 200){
		alert("链接地址不能超过200个字符");
		oMusicUrl.focus();
		return false;
	}
	if(!strTitle || strTitle == "音乐名称"){
		oMusicTitle.focus();
		return false;
	}
	if(!strUrl || strUrl == "音乐地址"){
		oMusicUrl.focus();
		return false;
	}
	oMusicFrom.submit();
}
</script>
</body>
</html>