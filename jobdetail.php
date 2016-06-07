<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">


<html>

<head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>

<title>（職業詳細）</title>


	<?php

	require_once 'DBmanager.php';//クラスファイル呼び出し

	//DB接続
	$con = connect();
//---------------------------------------------------------------------------------------------------
	//cookie確認登録
	if(isset($_COOKIE['Terminalid'])){
		//cookie登録されている
		$tid=$_COOKIE['Terminalid'];
	}else{
		//cookie登録されていない
		$queryset=terminal();
		$queryset=$queryset+1;
		//cookie登録↓
		$flag = setcookie('Terminalid',"$queryset",time()+ 2 * 365 * 24 * 3600);
		//端末番号最後尾更新
		terminalup($queryset);
		$tid = $queryset;

	}

$jobid=$_POST['jobid'];
//---------------------------------------------------------------------------------------------------
		//CSS埋め込み
		//アコーディオン
		//ハンバーガーメニュー

	?>
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


(function($) {
    // 読み込んだら開始
    $(function() {
    
        // アコーディオン
        var accordion = $("#box_content");
        accordion.each(function () {
            var noTargetAccordion = $(this).siblings(accordion);
            $(this).find(".switch").click(function() {
                $(this).next(".contentWrap").slideToggle();
                $(this).toggleClass("open");
                noTargetAccordion.find(".contentWrap").slideUp();
                noTargetAccordion.find(".switch").removeClass("open");
            });
            $(this).find(".btn_close").click(function() {
                var targetContentWrap = $(this).parent(".contentWrap");
                $(targetContentWrap).slideToggle();
                $(targetContentWrap).prev(".switch").toggleClass("open");
            });
        });
    
    });
})(jQuery);
</SCRIPT>




<!-- 画像がクリックされたら画像を入れ替えるJSP ------------------------------------------------------->
<?PHP
	$quryset=goodSearch($jobid,$tid);
	$data = mysql_fetch_row($quryset);

	if($data>0){
		$cnt=1;
	}else{
		$cnt=0;
}
?>

		<script type="text/javascript">
		var cnt = "<?php echo $cnt ?>";
		

		// img0.jpg,img1.jpgなどの数字が続いたファイルを複数用意します。
		nme = "./photo/img" // 画像のディレクトリとファイル名の数字と拡張子より前の部分
		exp = "jpg" // 拡張子
		
		function changeImage() {

			cnt++;
			cnt %= 2;
			document.img.src = nme + cnt + "." + exp;
			document.img2.src = nme + cnt + "." + exp;
			var Jid = "<?php echo $jobid; ?>";
			var Tid = "<?php echo $tid; ?>";

				$.ajax({
    					type:"POST",
					url: "value.php",
					data:{
					"data1":Jid,"data2":Tid
				},
				success: function(data) {

					//通信の確認
					// alert('success!!');
				},
				error: function(data) {
					alert('error!!!');
				}
				});
		}

		</SCRIPT>


</head>


<!-------------------body-------------------------------------------------------------------------------->

<body>
<!---ハンバーガーメニュー内容----->
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



	<?php 
		//階層表示
		echo "<div><ul>";
		echo "<li><a href=\"./topPage.php\">HOME</a></li>＞";
		echo "<li><a href=\"./bunya.php\">分野別</a></li>＞";
		$quryset = lowtagName($jobid);

		echo "<form  name='Form1' method='post' action='./subjectImageSearch.php' style=\"display:inline;\">";
		echo "<input type='hidden' name='sbjct' value=".$quryset[0][0].">";
		echo "<li><a href='javascript:Form1.submit()'>".$quryset[0][1]."</a></li>";

//---------------------------------------------------------------------------------------------------
	//職業情報取得
	$data = joblist($jobid);

		//１ループで１行データが取り出され、データが無くなるとループを抜けます。
		//階層表示職業名
		echo  "＞<li>".$data[1] ."</li><br />";//職業名
		echo "</ul></div>";
		echo "</form>";

		echo  "</br>";
		echo "<div id = \"box_mv\">";
		echo  "<p id=\"title\">";
		echo  $data[1] ."<br />";//職業名
		echo  $data[3] ."<br />";//職業名(英語)
		echo  "</p>";

       		echo "<img height='100' src='./create_image.php?id=".$data[6] ."' />";//職業画像
//---------------------------------------------------------------------------------------------------
	//気になるボタン表示

	$quryset=goodSearch($jobid,$tid);
	$data2 = mysql_fetch_row($quryset);
	echo  "<span id =\"btn_favorite_s\">";

	if($data2>0){
	echo "<A href=\"JavaScript:changeImage()\" >";
	echo "<IMG src=\"./photo/img1.jpg\" name=\"img\" id=\"img\" border=\"0\"></A><BR>";
	}else{
	echo "<A href=\"JavaScript:changeImage()\">";
	echo "<IMG src=\"./photo/img0.jpg\" name=\"img\" id=\"img\" border=\"0\"></A><BR>";

	}
	echo  "</span>";

//---------------------------------------------------------------------------------------------------

		//職業詳細続き
		echo "</div>";
		
		echo "<div id=\"box_info\">";
		echo  "<p id =\"catch\">";
		echo  $data[4] ."<br />";//一行キャッチコピー
		echo  "</p>";

		echo  "<p id=\"intro\">";
		echo  $data[5] ."<br />";//職業紹介文
		echo  "</p>";
		echo  "<br />";
		echo  "<br />";






//---------------------------------------------------------------------------------------------------





	echo "<div id=\"box_content\">";
	//専門家の写真コメント取得
	$quryset = expertlist($jobid);
	echo "<ul style=\"list-style:none;\">";


	echo "<br />";
	echo "<li id=\"btn_pro\" class=\"switch\" ><img src=\"./photo/test.png\"></li>";//imgタグの内容を書き換える
	echo "</li>";

    	echo "<div id=\"box_pro\" class=\"contentWrap displayNone\">";

	//１ループで１行データが取り出され、データが無くなるとループを抜けます。
	foreach ( $quryset as $data){

       		echo "<img height='100' src='./create_image.php?id=".$data[3] ."' />";//専門家画像
		echo "<p id=\"text_interview\">";
		echo  $data[1]."<br />";//専門家コメント
		echo "</p>";
	}

		echo "<p class = \"btn_close\">";
		echo "<a>";
		echo "<img src=\"./photo/close.png\">";//アコーディオン用のclose画像にimgタグの内容を書き換える
		echo "</a>";
		echo "</p>";

		echo "</div>";
//---------------------------------------------------------------------------------------------------

	//学生インタビューDBに対してSQL実行//


	$quryset = stviewlist($jobid);

	echo "<br />";
	echo "<li id=\"btn_student\" class=\"switch\" ><img src=\"./photo/test.png\"></li>";

    	echo "<div id=\"box_student\" class=\"contentWrap displayNone\">";

//	echo "<div id=\"box_student\">";
	//１ループで１行データが取り出され、データが無くなるとループを抜けます。
		foreach ($quryset as $data){

       		echo "<img height='100' src='./create_image.php?id=".$data[3] ."' />";//学生写真
		echo "<p id=\"test_interview\">";
		echo  $data[2] ."<br />";//学生コメント
		echo "</p>";
		}
		echo "<p class = \"btn_close\">";
		echo "<a>";
		echo "<img src=\"./photo/close.png\">";
		echo "</a>";
		echo "</p>";
		echo "</div>";


//---------------------------------------------------------------------------------------------------
	//お仕事スタジアムレポートDBに対してSQL実行//


	$quryset = jobstadiumlist($jobid);

	echo "<br />";

	echo "<li  id=\"btn_report\" class=\"switch\"><img src=\"./photo/test.png\"></li>";

    	echo "<div id=\"box_report\" class=\"contentWrap displayNone\">";
	//１ループで１行データが取り出され、データが無くなるとループを抜けます。
		
		foreach ($quryset as $data){
       		echo "<img height='100' src='./create_image.php?id=".$data[2] ."' />";//お仕事スタジアム画像
		echo "<p id=\"test_interview\">";
		echo  $data[3] ."<br />";//お仕事スタジアムレポート
		echo "</p>";
		}
		echo "<p class = \"btn_close\">";
		echo "<a>";
		echo "<img src=\"./photo/close.png\">";
		echo "</a>";
		echo "</p>";
		echo "</div>";


//---------------------------------------------------------------------------------------------------
	//気になるボタン表示
	$quryset=goodSearch($jobid,$tid);
	$data = mysql_fetch_row($quryset);

	echo  "<li id =\"btn_favorite\">";
	if($data>0){
		echo "<A href=\"JavaScript:changeImage()\">";
		echo "<IMG src=\"./photo/img1.jpg\" name=\"img2\" border=\"0\"></A><BR>";
	}else{
		echo "<A href=\"JavaScript:changeImage()\">";
		echo "<IMG src=\"./photo/img0.jpg\" name=\"img2\" border=\"0\"></A><BR>";

	}
	echo "</li>";
	echo "</ul>";
	echo "</div>";

//---------------------------------------------------------------------------------------------------

	//この仕事を目指す学校表示SQL実行//

	$quryset = asolist($jobid);

	echo "<br />";


	echo "<div id=\"box_school\">";
	echo "<h3>";
	echo "<img src=\"./photo/test.png\">";
	echo "</h3>";

	echo"<ul style=\"list-style:none;\">";

	//１ループで１行データが取り出され、データが無くなるとループを抜けます。
	foreach ($quryset as $data){


		echo "<li class=\"btn_school\">";
		echo "<dl>";
		echo "<form action=".$data[2]." method=\"post\">";//ページ遷移先指定
		echo "<button type=\"submit\" name=\"tagid\" ><dt>".$data[0]."</dt><dd>".$data[1]."</dd></button>";//学校学科名表示(ボタン)
		echo "</form>";
		echo "</dl>";
		echo "</li>";
		}
		echo "</ul>";
		echo "</div>";


		echo  "<br />";
		echo  "<br />";


//---------------------------------------------------------------------------------------------------

	//関連タグ表示SQL実行
	echo "<div id=\"box_tag\">";

	echo "<form action=\"./subjectImageSearch.php\" method=\"post\">";//ページ遷移先指定
	echo "<h4>分野:</h4>";
	//関数
	$quryset = lowtagName($jobid);

	echo "<div id =\"box_genre\">";
	echo "<ol>";
	foreach($quryset as $data) {
	echo"<ul style=\"list-style:none;\">";

		echo "<li class=\"btn_tag\">";
		echo "<button type=\"submit\" name=\"sbjct\" value=".$data[0].">".$data[1]."</button>";//分野
		echo "</li>";
		echo "</ul>";
	}
	echo "</ol>";
	echo "</div>";

	echo "<form action=\"subjectImageSearch.php\" method=\"post\">";

	echo "<h4>イメージ:</h4>";
	//関数
	$quryset = imageName($jobid);

	echo "<div id =\"box_image\">";
	echo "<ol>";
	foreach($quryset as $data) {
		echo"<ul style=\"list-style:none;\">";

		echo "<li class=\"btn_tag\">";
		echo "<button type=\"submit\" name=\"image\" value=".$data[0].">".$data[1]."</button>";//イメージ
		echo "</li>";
		echo "</ul>";
	}
	echo "</ol>";
	echo "</div>";
	echo "</div>";

//---------------------------------------------------------------------------------------------------

//DB切断
	dconnect($con);

//---------------------------------------------------------------------------------------------------
?>
//トップ
<p class="pagetop" style="display: block;"><a href="#wrap">トップ</a></p>//ページトップ移動
<?php
//メニューボタン
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



<p><small>Copyright (c) shigotobu.All Right Reserved.</small></p>



<!----アコーディオンidのcloseは複数使うためclassに変更しました---->





</body>
</html>


