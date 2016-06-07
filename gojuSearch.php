<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">


<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>

		<title>検索結果一覧</title>

<style type="text/css">

.switch {
    font-weight: bold;
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
</script>

	</head>

	<body>
		<header>
			<div id="header">
				<!--タイトル-->
				<h1><img src="//シゴト部"></h1>

				<!--メインメニュー-->
				<a class="btn"></a>
				<div class="drawr">
    				<ul id="menu" style="list-style:none;">
    				<li><a href="topPage.php">HOME</a></li>
    				<li><a href="bunya.php">分野から探す</a></li>
    				<li><a href="image.php">イメージから探す</a></li>
    				<li><a href="gojyu.php">五十音から探す</a></li>
    				<li><a href="ranking.php">気になるランキング</a></li>
    				<li><a href="recently.php">最近気になった仕事</a></li>
    				<li><form action="freewordSearch.php" method="POST"><input type="text" name="message"><input type="submit"></form></li>
    				</ul>
			</div>
		</header>
	<main>
		<div id="container">
			<div id="form_search">
				<!--50音順の行-->
				<select id="gyou">
					<option value="">選択してください</option>
					<option value="あ行" class="a">あ行</option>
					<option value="か行" class="k">か行</option>
					<option value="さ行" class="s">さ行</option>
					<option value="た行" class="t">た行</option>
					<option value="な行" class="n">な行</option>
					<option value="は行" class="h">は行</option>
					<option value="ま行" class="m">ま行</option>
					<option value="や行" class="y">や行</option>
					<option value="ら行" class="r">ら行</option>
					<option value="わ行" class="w">わ行</option>
				</select>

				<form  action="./gojuSearch.php" method="POST">
					<select id="moji" class="gojuon" name="slct">
					<option value="">選択してください</option>
				</select>

				<input type="submit" value="検索">
			</div></form>
		
<?php

//----------------------------------------------------------------------------------------------------

require_once 'DBmanager.php';

//DB接続
$con = connect();

//----------------------------------------------------------------------------------------------------

//メニューボタン
if (isset($_POST['gyou'])){//値が入ってる 
	$gyou = $_POST['gyou'];
	if ($gyou == 'a') {
		$g = array("あ","い","う","え","お");

	} else if ($gyou == 'k') {
		$g = array("か","き","く","け","こ","が","ぎ","ぐ","げ","ご");

	} else if ($gyou == 's') {

		$g = array("さ","し","す","せ","そ","ざ","じ","ず","ぜ","ぞ");

	} else if ($gyou == 't') {
		$g = array("た","ち","つ","て","と","だ","ぢ","づ","で","ど");

	} else if ($gyou == 'n') {
		$g = array("な","に","ぬ","ね","の");

	} else if ($gyou == 'h') {
		$g = array("は","ひ","ふ","へ","ほ","ば","び","ぶ","べ","ぼ");

	} else if ($gyou == 'm') {
		$g = array("ま","み","む","め","も");

	} else if ($gyou == 'y') {
		$g = array("や","ゆ","よ");

	} else if ($gyou == 'r') {
		$g = array("ら","り","る","れ","ろ");

	} else if ($gyou == 'w') {
		$g = array("わ","を","ん");
	}
	$data = order($g);
}

//----------------------------------------------------------------------------------------------------

if (isset($_POST['slct'])) {
	$on = $_POST['slct'];

	$data = orders($on);
}

//----------------------------------------------------------------------------------------------------

echo '<div id="box_">';

echo '<h2>';
//データの数
echo '検索結果'.$dataCount = count($data).'件';
echo '</h2>';

//１ページあたりの表示数
$perNum = 10;
//最大ページ数
$maxPageNum = ceil($dataCount / $perNum);

//URLにページ数が指定されてなければ１に
$nowPageNum = empty($_GET["page"]) ? 1 : $_GET["page"];

//次のページの値
$nextPageNum = $nowPageNum + 1;

//前のページの値
$prevPageNum = $nowPageNum - 1;

$page = $nowPageNum * 10 - 9 ;
//
//データを表示させる始点と終点
$startPoint = ($nowPageNum == 1) ? 0 : ($nowPageNum - 1) * $perNum;
$endPoint = $nowPageNum * $perNum;

//何件から何件
$aaaa;

if($endPoint >= $dataCount){
	$aaaa = 10 - ($endPoint - $dataCount);
}
else{
	$aaaa = 10;
}
	echo '(';
	echo $page;
	echo '～';
	echo $page + $aaaa - 1;
	echo '件を表示)';
	echo '<br />';

?>

		<ol>
		<li><img src="//専門家インタビュー">専門家インタビュー</li>
		<li><img src="//学生インタビュー">学生インタビュー</li>
		<li><img src="//お仕事スタジアムレポート2016">お仕事スタジアムレポート2016</li>
		</ol>
	</div>

	<div id="list_result">

<?php

if (!empty($data)){

//結果表示
for($i = $startPoint; $i < $endPoint; $i++){
	if($i >= $dataCount) break;
		echo '<div><dl>';
		echo '<form  name="Form'.$i.'" method="post" action="./jobdetail.php" style="display:inline;">';
		echo '<input type="hidden" name="jobid" value="'.$data[$i][0].'">';//職業ID
		echo '<dt>';
		echo '<a href="javascript:Form'.$i.'.submit()">'.$data[$i][1].'</a>';
		echo '</dt>';//職業名
		echo '<dd>';
		echo '</form>';
//		echo '<a href="javascript:Form'.$i.'.submit()"><img src="./"></a>';
		echo '</dd>';//矢印
		echo '<dd>'.$data[$i][2] .'</dd>';//一言キャッチコピー
		echo '<dd>';
		echo '<ol>';//アイコン


		$stdnt = studentnull($data[$i][0]);
		if (/*専門家*/$stdnt !== '0') {
			echo '<li><img src="./"></li>';
		}

		$exprt = expertnull($data[$i][0]);
		if (/*学生*/ $exprt !== '0') {
			echo '<li><img src="./"></li>';
		}

		$wrkrp = workrpnull($data[$i][0]);
		if (/*レポート*/$wrkrp !== '0') {
			echo '<li><img src="./"></li>';
		}
	}
		echo '</ol></dd>';
		echo '</dl></div>';
		echo '</div>';

		echo '<div id="list_page"><ul>';

	//最初のページ以外で「前へ」を表示
	if($nowPageNum != 1){
		echo '<li><a href="?page='.$prevPageNum.'"><img>前へ</a></li><br />';
	}

	//ページ数表示
	for($p = 1; $p <= $maxPageNum; $p++) {
		echo '<li><a href="?page='.$p.'">'.$p.'</a></li><br />';
	}

	//最後のページ以外で「次へ」を表示
	if($nowPageNum < $maxPageNum){
		echo '<li><a href="?page='.$nextPageNum.'"><img>次へ</a></li><br />';
	}

	echo '</ul></div>';

}else{
	echo '<div id="list_result">';
	echo '検索結果0件';
	echo '</div>';
}

?>

			</div>
		</main>

<p class="pagetop" style="display: block;"><a href="#wrap">トップ</a></p>

<?php
//メインメニュー
//フリーワード
echo "<form action=\"freewordSearch.php\" method=\"POST\">";
echo "<input type=\"text\" name=\"message\">";
echo "<input type=\"submit\">";
echo "</form>";
//分野画面遷移
echo "<form action=\"bunya.php\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"分野から探す\">";
echo "</form>";
//イメージ画面遷移
echo "<form action=\"image.php\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"イメージから探す\">";
echo "</form>";
//50音画面遷移
echo "<form action=\"gojyu.php\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"五十音から探す\">";
echo "</form>";
//気になるランキング画面遷移
echo "<form action=\"ranking.php\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"気になるランキング\">";
echo "</form>";
//最近気になった仕事画面遷移
echo "<form action=\"recently.php\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"最近気になった仕事\">";
echo "</form>";
//HOME画面遷移
echo "<form action=\"topPage.php\" method=\"POST\">";
echo "<input type=\"submit\"  value=\"HOME\">";
echo "</form>";
?>

		<small>Copyright (c) shigotobu.All Right Reserved.</small>

	</body>

</html>
