<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>操作符</title>
</head>
<body>
	

<?php 
$out=`dir c:`;
$out=iconv('gbk',"utf-8",$out);
echo "<pre>$out</pre>";
?>

操作符<br />
->  访问类的成员<br />
new 初始化类的实例<br />
&   引用操作符<br />
@  抑制错误<br />
`...`  执行操作符，讲反相引号之间的命令当做服务器端的命令来执行<br />
[...]  数组操作符，也可以使用 =>
instranceof 类型操作符，检查一个对象是不是特定类的实例

</body>
</html>