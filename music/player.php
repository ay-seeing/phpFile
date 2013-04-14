<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>音乐播放</title>
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

?>
&nbsp;
<div class="music_box">
	<?php
		$str="select * from `phpstudy`.`musiclist` where `id`=1";
		$aMusics=mysql_query($str);
	?>
	<audio preload="preload" id="musicCarrier" src=<?php echo $aMusics["fileurl"]; ?>></audio>
	<div class="player_tool">
		<div class="player play" id="toolPlayer"></div>
		<div class="pre" id="toolPre"></div>
		<div class="next" id="toolNext"></div>
		<div class="name"><div class="motion" id="toolName">
		<?php echo $aMusics["title"]; ?>
		</div></div>
		<div class="frequency_list">
			<ul id="frequencyList"></ul>
		</div>
	</div>
	<div class="list">
		<ol id="musicList">
			<?php
				$str="select * from `phpstudy`.`musiclist`";
				$aMusics=mysql_query($str);
				while($row=mysql_fetch_array($aMusics)){
			?>
			<li data-src=<?php echo $row["fileurl"]; ?>><?php echo $row["title"]; ?></li>
			<?php 
			}
			?>
		</ol>
	</div>
</div>

<script type="text/javascript">
var oMusicCarrier = document.getElementById("musicCarrier");
var oMusicList = document.getElementById("musicList");
var aMusicList = oMusicList.getElementsByTagName("li");
var oToolPlayer = document.getElementById("toolPlayer");
var oToolPre = document.getElementById("toolPre");
var oToolNext = document.getElementById("toolNext");
var oToolName = document.getElementById("toolName");
var oRequencyList = document.getElementById("frequencyList");

oMusicList.onselectstart=function(){return false;}

// 创建频率
for(var iRequency = 0;iRequency < 10;iRequency++){
	oRequencyList.innerHTML += "<li></li>";
}
var aRequencyList=oRequencyList.getElementsByTagName("li");
// 频率跳动
function requencyStart(){
	if(oRequencyList.timer){clearInterval(oRequencyList.timer);}
	oRequencyList.timer=setInterval(function(){
		for(var i = 0;i < aRequencyList.length;i++){
			aRequencyList[i].style.height = Math.random()*20+"px";
		}
	},100);
}
// 频率停止跳动
function requencyStop(){
	if(oRequencyList.timer){clearInterval(oRequencyList.timer);}
	for(var i = 0;i < aRequencyList.length;i++){
		aRequencyList[i].style.height = "1px";
	}
}

// 如果音乐列表高于父级，则创滚动条
var oScrollBar;
var oScrollBtn;
if(oMusicList.offsetHeight>oMusicList.parentNode.offsetHeight){
	if(!oScrollBar){
		oScrollBar = document.createElement("div");
		oScrollBar.setAttribute("class","scroll_bar");
		oScrollBtn = document.createElement("div");
		oScrollBtn.className = "scroll_btn";
		oScrollBar.appendChild(oScrollBtn);
		oMusicList.parentNode.appendChild(oScrollBar);
	}
	oScrollBtn.style.height = oMusicList.parentNode.offsetHeight/oMusicList.offsetHeight*(oScrollBar.offsetHeight-2)+"px";

	oScrollBtn.onmousedown = function(ev){
		var oEvent = event || ev;
		var _this = this;
		this.style.cursor = "pointer";
		var nMouse_y = oEvent.clientY;
		var oTop = this.offsetTop;
		document.onmousemove = function(ev){
			var oEvent = event || ev;
			var nY = oEvent.clientY-nMouse_y+oTop;
			if(nY < 1){
				nY = 1;
			}else if(nY > _this.parentNode.offsetHeight-2-_this.offsetHeight){
				nY = _this.parentNode.offsetHeight-2-_this.offsetHeight;
			}
			_this.style.top = nY + "px";
			oMusicList.style.top = -nY/(_this.parentNode.offsetHeight-2)*oMusicList.offsetHeight+"px";
		}
	}
	oScrollBtn.onmouseup = function(){
		this.style.cursor = "default";
		document.onmousemove = null;
	}

	// 鼠标滚动事件
	oMusicList.onmousewheel = function(ev){
		if(ev.wheelDelta > 0){
			//alert(ev.wheelDelta);
			var oT = oMusicList.offsetTop+ev.wheelDelta;
			if(oT > 0){
				oT = 0;
			}
		}else{
			//alert(ev.wheelDelta);
			var oT = oMusicList.offsetTop+ev.wheelDelta;
			
			if(oT < (oMusicList.parentNode.offsetHeight-oMusicList.offsetHeight)){
				oT = oMusicList.parentNode.offsetHeight - oMusicList.offsetHeight;
			}
		}
		this.style.top = oT+"px";
		oScrollBtn.style.top=-oT/oMusicList.offsetHeight*(oScrollBtn.parentNode.offsetHeight-2)+1+"px";
	}
}


var musicNum=0;
// 列表音乐双击事件
for(var iMusicList = 0;iMusicList < aMusicList.length;iMusicList++){
	aMusicList[iMusicList].index=iMusicList;
	aMusicList[iMusicList].ondblclick = function(){
		fnMusic(this);
		//console.log(musicUrl);
		//oMusicCarrier.setAttribute("preload","preload");
	}
}

function fnMusic(obj){
	var musicUrl=obj.getAttribute("data-src");
	oMusicCarrier.src = musicUrl;
	oToolName.innerHTML = obj.innerHTML;
	for(var i=0;i<aMusicList.length;i++){
		aMusicList[i].className="";
	}
	oMusicCarrier.play();
	requencyStart();
	//console.log(obj.index);
	obj.className="play";
	musicNum=obj.index;
}

// 点击开始/暂停按钮
oToolPlayer.ok = true;
oToolPlayer.onclick = function(){
	if(oToolPlayer.ok){
		oToolPlayer.ok = false;
		oMusicCarrier.pause();
		//oMusicCarrier.removeAttributeNode("autoplay");
		requencyStop();
		if(oMusicCarrier.timer){clearInterval(oMusicCarrier.timer)}
	}else{
		oToolPlayer.ok = true;
		//oMusicCarrier.setAttribute("autoplay","autoplay");
		oMusicCarrier.play();
		requencyStart();
		musicEnd();
	}
	//document.getElementById("txt").innerHTML=oMusicCarrier.currentTime;
}

// if end
function musicEnd(){
	oMusicCarrier.timer = setInterval(function(){
		// 判断音频是否播放完成
		if(oMusicCarrier.ended){
			// 音频总长度
			var musicLong=oMusicCarrier.duration;
			// 音频当前播放时间
			var curent=oMusicCarrier.currentTime;
			clearInterval(oMusicCarrier.timer);
			var num=++musicNum;
			if(num==aMusicList.length){num=aMusicList.length-1;alert("已经是最后一首歌！");return;}
			fnMusic(aMusicList[num]);
		}
	},1);
}

oToolPre.onclick=function(){
	var num=--musicNum;
	if(num==-1){num=0;alert("已经是第一首歌！");return;}
	fnMusic(aMusicList[num]);
}
oToolNext.onclick=function(){
	var num=++musicNum;
	if(num==aMusicList.length){num=aMusicList.length-1;alert("已经是最后一首歌！");return;}
	fnMusic(aMusicList[num]);
}
</script>

<?php 
mysql_close($conn);
exit;
?>
</body>
</html>