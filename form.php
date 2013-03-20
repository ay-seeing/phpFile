<?php
if($_GET["title"]){
	echo "<p><strong>$_GET[title]</strong>$_GET[content]</p>";
}else{
?>
<form method="form.php" arction="get" >
	<input type="text" name="title"><br />
	<input type="text" name="content"><br />
	<input type="submit" value="提交">
</form>
<?php
} 
?>