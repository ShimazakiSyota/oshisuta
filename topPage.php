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
});

$(function(){

    // 行のプルダウンが変更されたら
    $("#gyou").change(function(){
	//select内のオプションを全削除
	var select = document.getElementById('moji');

	var gyou = document.getElementById('gyou').value;

	while (select.firstChild) {
		select.removeChild(select.firstChild);
	}

	//if（選ばれた行が「あ」だったら
	if (gyou == "あ行") {
		//あ～おを追加（OPTIONで）
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'あ');
		option1.innerHTML = 'あ';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'い');
		option2.innerHTML = 'い';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'う');
		option3.innerHTML = 'う';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'え');
		option4.innerHTML = 'え';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'お');
		option5.innerHTML = 'お';
		select.appendChild(option5);
	} else if (gyou == "か行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'か');
		option1.innerHTML = 'か';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'き');
		option2.innerHTML = 'き';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'く');
		option3.innerHTML = 'く';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'け');
		option4.innerHTML = 'け';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'こ');
		option5.innerHTML = 'こ';
		select.appendChild(option5);

	} else if (gyou == "さ行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'さ');
		option1.innerHTML = 'さ';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'し');
		option2.innerHTML = 'し';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'す');
		option3.innerHTML = 'す';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'せ');
		option4.innerHTML = 'せ';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'そ');
		option5.innerHTML = 'そ';
		select.appendChild(option5);

	} else if (gyou == "た行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'た');
		option1.innerHTML = 'た';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'ち');
		option2.innerHTML = 'ち';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'つ');
		option3.innerHTML = 'つ';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'て');
		option4.innerHTML = 'て';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'と');
		option5.innerHTML = 'と';
		select.appendChild(option5);

	} else if (gyou == "な行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'な');
		option1.innerHTML = 'な';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'に');
		option2.innerHTML = 'に';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'ぬ');
		option3.innerHTML = 'ぬ';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'ね');
		option4.innerHTML = 'ね';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'の');
		option5.innerHTML = 'の';
		select.appendChild(option5);

	} else if (gyou == "は行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'は');
		option1.innerHTML = 'は';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'ひ');
		option2.innerHTML = 'ひ';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'ふ');
		option3.innerHTML = 'ふ';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'へ');
		option4.innerHTML = 'へ';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'ほ');
		option5.innerHTML = 'ほ';
		select.appendChild(option5);

	} else if (gyou == "ま行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'ま');
		option1.innerHTML = 'ま';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'み');
		option2.innerHTML = 'み';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'む');
		option3.innerHTML = 'む';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'め');
		option4.innerHTML = 'め';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'も');
		option5.innerHTML = 'も';
		select.appendChild(option5);

	} else if (gyou == "や行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'や');
		option1.innerHTML = 'や';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'ゆ');
		option2.innerHTML = 'ゆ';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'よ');
		option3.innerHTML = 'よ';
		select.appendChild(option3);


	} else if (gyou == "ら行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'ら');
		option1.innerHTML = 'ら';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'り');
		option2.innerHTML = 'り';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'る');
		option3.innerHTML = 'る';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'れ');
		option4.innerHTML = 'れ';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'ろ');
		option5.innerHTML = 'ろ';
		select.appendChild(option5);

	} else if (gyou == "わ行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'わ');
		option1.innerHTML = 'わ';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'を');
		option2.innerHTML = 'を';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'ん');
		option3.innerHTML = 'ん';
		select.appendChild(option3);

	}

	});
})

$(function(){

    // 行のプルダウンが変更されたら
    $("#gyou").change(function(){
	//select内のオプションを全削除
	var select = document.getElementById('moji');

	var gyou = document.getElementById('gyou').value;

	while (select.firstChild) {
		select.removeChild(select.firstChild);
	}

	//if（選ばれた行が「あ」だったら
	if (gyou == "あ行") {
		//あ～おを追加（OPTIONで）
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'あ');
		option1.innerHTML = 'あ';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'い');
		option2.innerHTML = 'い';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'う');
		option3.innerHTML = 'う';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'え');
		option4.innerHTML = 'え';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'お');
		option5.innerHTML = 'お';
		select.appendChild(option5);
	} else if (gyou == "か行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'か');
		option1.innerHTML = 'か';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'き');
		option2.innerHTML = 'き';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'く');
		option3.innerHTML = 'く';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'け');
		option4.innerHTML = 'け';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'こ');
		option5.innerHTML = 'こ';
		select.appendChild(option5);

	} else if (gyou == "さ行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'さ');
		option1.innerHTML = 'さ';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'し');
		option2.innerHTML = 'し';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'す');
		option3.innerHTML = 'す';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'せ');
		option4.innerHTML = 'せ';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'そ');
		option5.innerHTML = 'そ';
		select.appendChild(option5);

	} else if (gyou == "た行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'た');
		option1.innerHTML = 'た';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'ち');
		option2.innerHTML = 'ち';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'つ');
		option3.innerHTML = 'つ';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'て');
		option4.innerHTML = 'て';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'と');
		option5.innerHTML = 'と';
		select.appendChild(option5);

	} else if (gyou == "な行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'な');
		option1.innerHTML = 'な';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'に');
		option2.innerHTML = 'に';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'ぬ');
		option3.innerHTML = 'ぬ';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'ね');
		option4.innerHTML = 'ね';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'の');
		option5.innerHTML = 'の';
		select.appendChild(option5);

	} else if (gyou == "は行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'は');
		option1.innerHTML = 'は';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'ひ');
		option2.innerHTML = 'ひ';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'ふ');
		option3.innerHTML = 'ふ';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'へ');
		option4.innerHTML = 'へ';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'ほ');
		option5.innerHTML = 'ほ';
		select.appendChild(option5);

	} else if (gyou == "ま行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'ま');
		option1.innerHTML = 'ま';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'み');
		option2.innerHTML = 'み';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'む');
		option3.innerHTML = 'む';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'め');
		option4.innerHTML = 'め';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'も');
		option5.innerHTML = 'も';
		select.appendChild(option5);

	} else if (gyou == "や行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'や');
		option1.innerHTML = 'や';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'ゆ');
		option2.innerHTML = 'ゆ';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'よ');
		option3.innerHTML = 'よ';
		select.appendChild(option3);


	} else if (gyou == "ら行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'ら');
		option1.innerHTML = 'ら';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'り');
		option2.innerHTML = 'り';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'る');
		option3.innerHTML = 'る';
		select.appendChild(option3);

		var option4 = document.createElement('option');
		option4.setAttribute('value', 'れ');
		option4.innerHTML = 'れ';
		select.appendChild(option4);

		var option5 = document.createElement('option');
		option5.setAttribute('value', 'ろ');
		option5.innerHTML = 'ろ';
		select.appendChild(option5);

	} else if (gyou == "わ行") {
		var option1 = document.createElement('option');
		option1.setAttribute('value', 'わ');
		option1.innerHTML = 'わ';
		select.appendChild(option1);

		var option2 = document.createElement('option');
		option2.setAttribute('value', 'を');
		option2.innerHTML = 'を';
		select.appendChild(option2);

		var option3 = document.createElement('option');
		option3.setAttribute('value', 'ん');
		option3.innerHTML = 'ん';
		select.appendChild(option3);

	}

	});
})


</SCRIPT>

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
	echo "<form name='Form1' action='./subjectImageSearch.php' method = 'POST'>";
	echo "<li id=\"btn_z\">";
	echo "<input type='hidden' name='bunya' value=".$value[0].">";
	echo "<a href='javascript:Form1.submit()'>";
	echo "<img height='100' img src='./create_image.php?id=".$value[3]."' /></a>";
//	echo "<button type='submit' name='bunya' value='".$value[0]."'>".$value[1]."</button><br>";
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
	echo "<h3>";
	echo '50音順から探す';
	echo "</h3>";

			echo '<div id="box_50on">';

				echo '<select id="gyou">';
					echo '<option value="">選択してください</option>';
					echo '<option value="あ行" class="a">あ行</option>';
					echo '<option value="か行" class="k">か行</option>';
					echo '<option value="さ行" class="s">さ行</option>';
					echo '<option value="た行" class="t">た行</option>';
					echo '<option value="な行" class="n">な行</option>';
					echo '<option value="は行" class="h">は行</option>';
					echo '<option value="ま行" class="m">ま行</option>';
					echo '<option value="や行" class="y">や行</option>';
					echo '<option value="ら行" class="r">ら行</option>';
					echo '<option value="わ行" class="w">わ行</option>';
				echo '</select>';

				echo '<form  action="./gojuSearch.php" method="POST">';
					echo '<select id="moji" class="gojuon" name="slct">';
					echo '<option value="">選択してください</option>';
				echo '</select>';

				echo '<input type="submit" value="検索">';
			echo '</form></div>';


	dconnect($con);

//先頭に戻る
echo '<p class="pagetop" style="display: block;"><a href="#wrap">トップ</a></p>';
	
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
<p><small>Copyright (c) shigotobu.All Right Reserved.</small></p>

</BODY>
</HTML>