<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sort</title>
</head>
<body>
<?php 
$arr=array("name"=>"broken","height"=>"172","weight"=>"51kg","sex"=>"men");
sort($arr);
print_r($arr);
echo "<hr />";
echo ord("broken")."<br />";
echo ord("men")."<br />";
if("broken"<"172"){
	echo "true";
}else{
	echo "false";
}

?>
</body>
</html>