<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>常量</title>
</head>
<body>
<p>常量一旦声明，在全局可见。那么，在函数内声明常量可以在函数外访问。</p>
用 define() 函数来定义常量，如：
define(MYNAME,"broken");
<?php 
define(MYNAME,"broken");
echo MYNAME;
?>
<p>常量名约定俗成的用全部用大写字母，当然php并没有这么规定，只是这样方便编程。</p>
<h4>php预定了一些常量，我们可以用 phpinfo() 函数来查看。</h4>
<p>这个函数给出一个PHP预定义常量和变量的列表，以及其他有用的信息。</p>
<p>变量和常量的另一个差异在于常量只可以保存布尔值、整数、浮点数或字符串数据。这些类型都是标量数据。</p>
<?php 
phpinfo();
?>

</body>
</html>