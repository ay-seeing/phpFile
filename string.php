<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php-string-指定</title>
</head>
<body>
<?php 
echo "string<br />";
?>
<p>php讲试着计算双引号里面的字符串，所以 "$str abc" 会读取到 $str 这个变量，后面再连接字符串 " abc"</p>
<p>单引号则不会这样，单引号就是一个单纯的字符串，不会读取到里面的变量</p>
<?php
$yy="7845";
echo "$yy abc<br />";
?>
<?php 
echo <<<oo
hello world!
oo;
?>
</body>
</html>