<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>变量</title>
</head>
<body>
	

<?php 
/*function fn(){
	$a="abc";
	global[$a];
}
echo $a;*/
$str="15abc";
echo $str%2.."<br />";
$a=&$str;
echo $a."<br />";
$str="hello word!";
echo $a;
?>
<h4>超级全局标量列表</h4>
<table width="500" border="1" cellpadding="5" style="border-collapse:collapse;">
	<tr>
		<td>$_GLOBALS</td>
		<td>所有全局变量数组</td>
	</tr>
	<tr>
		<td>$_SERVER</td>
		<td>服务器环境变量数组</td>
	</tr>
	<tr>
		<td>$_GET</td>
		<td>通过 get 方法传递给该脚本的变量数组</td>
	</tr>
	<tr>
		<td>$_POST</td>
		<td>通过 post 方法传递给该脚本的变量数组</td>
	</tr>
	<tr>
		<td>$_COOKIE</td>
		<td>cookie 变量数组</td>
	</tr>
	<tr>
		<td>$_FILES</td>
		<td>与文件上传相关的变量数组</td>
	</tr>
	<tr>
		<td>$_REQUEST</td>
		<td>所有用户输入的变量数组，包括 $_GET、$_POST 和 $_COOKIE 所包含的内容</td>
	</tr>
	<tr>
		<td>$_SESSION</td>
		<td>会话变量数组</td>
	</tr>
</table>
<hr>
getType($var)    测试变量类型<br />
<?php 
$var1="abcdef";
echo getType($var1);
?>
<br />
setType($var)    设置变量类型<br />


</body>
</html>