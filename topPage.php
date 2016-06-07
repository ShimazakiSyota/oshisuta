<HTML>
<HEAD>

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

<TITLE>メニュー画面</TITLE>
</HEAD>

<BODY>
<a class="btn"></a>
<div class="drawr">
    <ul id="menu" style="list-style:none;">
    <li><a href="topPage.php">HOME</a></li>
    <li><a href="bunya.php">分野から探す</a></li>
    <li><a href="image.php">イメージから探す</a></li>
    <li><a href="gojyu.php">五十音から探す</a></li>
    <li><a href="ranking.php">気になるランキング</a></li>
    <li><a href="recently.php">最近気になった仕事</a></li>
    <li><a href="freeword.php">フリーワード</a></li>
    </ul>
</div>


<?php



session_start();

require_once 'DBmanager.php';
	$con = connect();
	//ランキング検索
	//関数呼び出しJOBID、JOBNAME、JOBIDのCOUNT　例200
	echo "<h2>";
	echo "<img>"; 
	echo "</h2>";
	echo "<div id=\"box_rank\">";
	echo "<ol id=\"list.rank\">";
		
	
	$ranking = rank();
	
	for($ci=0;$ci<3;$ci++){
		if($ci==0){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank1\">";
//	echo "<img>";
	echo "<form name='Form1' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[0][0].">";
	echo "<a href='javascript:Form1.submit()'>".$ranking[0][1]."</a>";
	echo "</form>";
	echo "</li>";

			}
		}else if($ci==1){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank2\">";
//	echo "<img>";
	echo "<form name='Form2' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[1][0].">";
	echo "<a href='javascript:Form2.submit()'>".$ranking[1][1]."</a>";
	echo "</form>";
	echo "</li>";

              }
		}else if($ci==2){
			if(!empty($ranking[$ci][0])){

	echo "<li id=\"list_rank3\">";
//	echo "<img>";
	echo "<form name='Form3' method='post' action='jobdetail.php'>";
	echo "<input type='hidden' name='jobid' value=".$ranking[2][0].">";
	echo "<a href='javascript:Form3.submit()'>".$ranking[2][1]."</a>";
	echo "</form>";
	echo "</li>";

			}
		}
	}
	echo "</ol>";
	echo "</div>";


	echo "<p id=\"btn_more\">";
	echo "<a href ='ranking.PHP'>";
	echo ("もっと見る");
//	echo "<img>";
	echo "</a>";
	echo "</p>";
   echo "<h2>";
   echo "<img>";
   echo "</h2>";


	//分野検索
	echo "<div id=\"box_genre\">";
	echo "<ul>";
	echo "<li id=\"btn_z\">";
	echo "<b>分野別から探す</b>";
	$BigTadList = tagSelectAllKubun('0');
	foreach( $BigTadList as $value ){
	echo "<form action='./subjectImageSearch.php' method = 'POST'>";
	echo "<li id=\"btn_z\">";
		echo "<button type='submit' name='bunya' value='".$value[0]."'>".$value[1]."</button><br>";
	echo "</li>";
	}
	echo "</ul>";
	echo "</div>";
	echo "</form>";


	
	//イメージ検索
	echo "<div id=\"box_image\">";
	echo "<ul>";
	echo "<h3>";
	echo "</h3>";
	echo "<b>イメージから探す</b>";
	$ImageList = tagSelectAllKubun('2');
	foreach( $ImageList as $value ){
	echo "<form action='./subjectImageSearch.php' method = 'POST'>";
	echo "<li>";
	echo "<button type='submit' name='image' value='".$value[0]."'>".$value[1]."</button><br>";
	echo "</li>";
	}
	echo "</ul>";
	echo "</div>";
	echo "</form>";

	//フリーワード
	echo "<div id=\"box_keyword\">";
	echo "<h3>";
	echo "</h3>";
	echo "<form action=\"freewordSearch.PHP\" method=\"POST\">";
	echo "<input type=\"text\" name=\"message\">";
	echo "<input type=\"submit\">";
	echo "</form>";
	echo "</div>";
	

	//50音順
    echo"<div id=\box_50on\">";
	echo "<h3>";
	echo "</h3>";
    echo "<ol>";
    echo "<li>";
    echo "<form action='./gojuSearch.php' method='POST'>";
	echo "<button type='submit'  name='gyou' value='a'>あ行</button><br>";
    echo "<button type='submit'  name='gyou' value='k'>か行</button><br>";
    echo "<button type='submit'  name='gyou' value='s'>さ行</button><br>";
	echo "<button type='submit'  name='gyou' value='t'>た行</button><br>";
	echo "<button type='submit'  name='gyou' value='n'>な行</button><br>";
	echo "<button type='submit'  name='gyou' value='h'>は行</button><br>";
	echo "<button type='submit'  name='gyou' value='m'>ま行</button><br>";
	echo "<button type='submit'  name='gyou' value='y'>や行</button><br>";
	echo "<button type='submit'  name='gyou' value='r'>ら行</button><br>";
	echo "<button type='submit'  name='gyou' value='w'>わ行</button><br>";
	echo "</form>";

	
	
	


  echo"</li>";
    echo"</ol>";
    echo"</div>";

	dconnect($con);

//先頭に戻る
echo '<p class="pagetop" style="display: block;"><a href="#wrap">トップ</a></p>';
echo '<p><small>Copyright (c) shigotobu.All Right Reserved.</small></p>';
	
//メニューボタン
//フリーワード

echo "<form action=\"freewordSearch.php\" method=\"POST\">";
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
echo "<form action=\"topPage.PHP\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"HOME\">";
echo "</form>";


?>
</BODY>
</HTML>