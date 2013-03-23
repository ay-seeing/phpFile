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
setType($var,typeName)    设置变量类型<br />
<?php 
echo setType($var1,"double")."<br />";
echo getType($var1);
?>
<h4>其他检测变量<strong style="color:red">类型</strong>函数</h4>
is_string()   检测变量是不是数组 <br />
is_array()   检测变量是不是数组 <br />
is_double()  is_float()   is_real()   （都是相同的函数） 检测变量是不是浮点数（双精度类型） <br />
is_long()   is_int()   is_integer()   (都是相同的函数)  检测变量是不是整数型<br />
is_bool()   检测变量是不是布尔类型<br />
is_object()   检测变量是不是对象<br />
is_resource()  检测变量是不是一个资源<br />
is_null()  检测变量是不是为null<br />
is_scalar()  检查变量是不是标量，即 一个整数、布尔值、字符串或浮点数。<br />
is_numeric()  检测变量是不是任何类型的数字或数字字符串<br />
is_callable()   检测变量是不是有效的函数名<br /><br />

<h4>测试变量<strong style="color:red">状态</strong></h4>
isset($var)  如果变量存在返回 <br />true（可以传递一个由逗号隔开的变量列表，如果所有变量都被设置了，则返回 true）<br />
unset($var)  销毁一个变量，同样可以传递多个变量<br />
empty() 检测一个变量是否存在，以及他的值是否为非空和非0，相应的返回 true 或 false<br />
<?php 
$strss="";
echo isset($strss)."<br />";
echo empty($strss)."<br />";
?>

<h4>变量重解释</h4>
intval($var,baseVal);  转换为整数
floatval($var)   转换为浮点数
strval($var)   转换为字符串
</body>
</html>