<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">

//ページトップ
$(document).ready(function() {
  var pagetop = $('.pagetop');
    $(window).scroll(function () {
       if ($(this).scrollTop() > 100) {
            pagetop.fadeIn();
       } else {
            pagetop.fadeOut();
            }
       });
       pagetop.click(function () {
           $('body, html').animate({ scrollTop: 0 }, 500);
              return false;
   });
});</SCRIPT>

<style type="text/css">

.displayNone {
    display: none;
}

.accordion {
    margin: 0 0 10px;
    padding: 10px;
}

.switch {
    font-weight: bold;
}

.open {
    text-decoration: underline;
}

.btn {
    background:transparent url(btn.png) no-repeat 0 0;
    display: block;
    width:35px;
    height: 35px;
    position: absolute;
    top:20px;
    right:20px;
    cursor: pointer;
    z-index: 200;
}
.peke {
    background-position: -35px 0;
}
.drawr {
    display: none;
    background-color:rgba(0,0,0,0.6);
    position: absolute;
    top: 0px;
    right:0;
    width:260px;
    padding:60px 0 20px 20px;
    z-index: 100;
}
#menu li {
    width:260px;
}
#menu li a {
    color:#fff;
    display: block;
    padding: 15px;
}        

</style>




<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
//ハンバーガーメニュー
$(function($) {
        WindowHeight = $(window).height();
        $('.drawr').css('height', WindowHeight); //メニューをwindowの高さいっぱいにする

        $(document).ready(function() {
                $('.btn').click(function(){ //クリックしたら
                        $('.drawr').animate({width:'toggle'}); //animateで表示・非表示
                        $(this).toggleClass('peke'); //toggleでクラス追加・削除
                });
        });
});
</SCRIPT>

		<title>　ランキング　</title>
	</head>
	<body>
<a class="btn"></a>
<div class="drawr">
    <ul id="menu" style="list-style:none;">
    <li><a href="topPage.php">HOME</a></li>
    <li><a href="bunya.php">分野から探す</a></li>
    <li><a href="image.php">イメージから探す</a></li>
    <li><a href="gojyu.php">五十音から探す</a></li>
    <li><a href="ranking.php">気になるランキング</a></li>
    <li><a href="recently.php">最近気になった仕事</a></li>
    <li><form action="freewordSearch.php" method="POST">
	<input type="text" name="message">
	<input type="submit">
	</form>
	</li>
    </ul>
</div>


		<h1>ランキング</h1>
<?php

//----------------------------------------------------------------------------------------------------
require_once 'DBmanager.php'; //関数呼び出しより手前に記述する

//DB接続
$con = connect();
	$ranking = rank();

//メニューボタン

echo "<p id=\"mv\">";
//echo "<img>";
echo "</p>";
echo "<div id=\"box.rank\">";
echo "<h2>";
echo "</h2>";
echo "<table>";
//トップページのランキング
	$ranking = rank();
	
	for($ci=0;$ci<20;$ci++){
		if($ci==0){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank1\">";
	echo "<img>";
	echo "<form name='Form1' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[0][0].">";
	echo "<a href='javascript:Form1.submit()'>".$ranking[0][1]."</a>";
	echo "</form>";
	echo "</li>";
	
			}
		}else if($ci==1){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank2\">";
	echo "<img>";
	echo "<form name='Form2' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[1][0].">";
	echo "<a href='javascript:Form2.submit()'>".$ranking[1][1]."</a>";
	echo "</form>";
	echo "</li>";

              }
		}else if($ci==2){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank3\">";
	echo "<img>";
	echo "<form name='Form3' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[2][0].">";
	echo "<a href='javascript:Form3.submit()'>".$ranking[2][1]."</a>";
	echo "</form>";
	echo "</li>";

			}
				}else if($ci==3){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank4\">";
	echo "<img>";
	echo "<form name='Form4' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[3][0].">";
	echo "<a href='javascript:Form4.submit()'>".$ranking[3][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==4){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank5\">";
	echo "<img>";
	echo "<form name='Form5' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[4][0].">";
	echo "<a href='javascript:Form5.submit()'>".$ranking[4][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==5){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank6\">";
	echo "<img>";
	echo "<form name='Form6' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[5][0].">";
	echo "<a href='javascript:Form6.submit()'>".$ranking[5][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==6){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank7\">";
	echo "<img>";
	echo "<form name='Form7' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[6][0].">";
	echo "<a href='javascript:Form7.submit()'>".$ranking[6][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==7){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank8\">";
	echo "<img>";
	echo "<form name='Form8' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[7][0].">";
	echo "<a href='javascript:Form8.submit()'>".$ranking[7][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==8){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank9\">";
	echo "<img>";
	echo "<form name='Form9' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[8][0].">";
	echo "<a href='javascript:Form9.submit()'>".$ranking[8][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==9){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank10\">";
	echo "<img>";
	echo "<form name='Form10' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[9][0].">";
	echo "<a href='javascript:Form10.submit()'>".$ranking[9][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==10){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank11\">";
	echo "<img>";
	echo "<form name='Form11' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[10][0].">";
	echo "<a href='javascript:Form11.submit()'>".$ranking[10][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==11){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank12\">";
	echo "<img>";
	echo "<form name='Form12' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[11][0].">";
	echo "<a href='javascript:Form12.submit()'>".$ranking[11][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==12){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank13\">";
	echo "<img>";
	echo "<form name='Form13' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[12][0].">";
	echo "<a href='javascript:Form13.submit()'>".$ranking[12][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==13){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank14\">";
	echo "<img>";
	echo "<form name='Form14' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[13][0].">";
	echo "<a href='javascript:Form14.submit()'>".$ranking[13][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==14){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank15\">";
	echo "<img>";
	echo "<form name='Form15' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[14][0].">";
	echo "<a href='javascript:Form15.submit()'>".$ranking[14][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==15){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank16\">";
	echo "<img>";
	echo "<form name='Form16' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[15][0].">";
	echo "<a href='javascript:Form16.submit()'>".$ranking[15][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==16){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank17\">";
	echo "<img>";
	echo "<form name='Form17' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[16][0].">";
	echo "<a href='javascript:Form17.submit()'>".$ranking[16][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==17){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank18\">";
	echo "<img>";
	echo "<form name='Form18' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[17][0].">";
	echo "<a href='javascript:Form18.submit()'>".$ranking[17][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==18){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank19\">";
	echo "<img>";
	echo "<form name='Form19' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[18][0].">";
	echo "<a href='javascript:Form19.submit()'>".$ranking[18][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}else if($ci==19){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank20\">";
	echo "<img>";
	echo "<form name='Form20' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[19][0].">";
	echo "<a href='javascript:Form20.submit()'>".$ranking[19][1]."</a>";
	echo "</form>";
	echo "</li>";

	              }
				}
	}


echo "</table>";
echo "</div>";
echo "<p id=\"date\">";
echo "</p>";


//先頭に戻る
echo '<p class="pagetop" style="display: block;"><a href="#wrap">トップ</a></p>';
echo '<p><small>Copyright (c) shigotobu.All Right Reserved.</small></p>';


//メニューボタン
//フリーワード
echo "<form action=\"freeword.php.PHP\" method=\"POST\">";
echo "<input type=\"text\" name=\"message\">";
echo "<input type=\"submit\">";
echo "</form>";
//分野画面遷移
echo "<form action=\"bunya.PHP\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"分野から探す\">";
echo "</form>";
//イメージ画面遷移
echo "<form action=\"image.PHP\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"イメージから探す\">";
echo "</form>";
//50音画面遷移
echo "<form action=\"gojyu.PHP\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"五十音から探す\">";
echo "</form>";
//気になるランキング画面遷移
echo "<form action=\"ranking.PHP\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"気になるランキング\">";
echo "</form>";
//最近気になった仕事画面遷移
echo "<form action=\"recently.PHP\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"最近気になった仕事\">";
echo "</form>";
//HOME画面遷移
echo "<form action=\"topPage.php\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"HOME\">";
echo "</form>";



//DB切断
dconnect($con);

?>
	</body>
</html>

