<html>
	<head>
		<div class="head">
		<title>職業追加</title>
		<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>職業追加</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./jobTop.php'>職業TOPページへ戻る</a><br></h3>
		</div></div>

<script type="text/javascript">
//ポップアップのソース
function disp(){
	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
        var flag = confirm ( "この内容で追加してよろしいですか？");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
}
</script>

<?php
	session_start(); //session開始

	require_once 'DBmanager.php'; //DB読込
	$con = connect(); //DB接続

	sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

	$jobAll = jobAll($_POST['jobUpd']);

	mb_regex_encoding("UTF-8"); 

	if ($_POST['jobUpd'] == 0){
		echo "<form action=jobInsert.php method =POST enctype='multipart/form-data' onsubmit='return disp()'>";
		echo "<center>職業名 : <input type='text' size='15' NAME='jobInfo[]' style='font-family:Tahoma;' pattern='^[ぁ-んァ-ヶー一-龠]+$' title='日本語で入力してください' required><br /><br />";
		echo "職業名【ふりがな】: <input type='text' size='15' NAME='jobInfo[]' style='font-family:Tahoma;' pattern='^[ぁ-んー一-]+$' title='ひらがなで入力してください' required><br /><br />";
		echo "職業名【英語】：<input type='text' size='15' NAME='jobInfo[]' style='font-family:Tahoma; ime-mode:disabled;' pattern='^[A-Za-z\s]+$' title='英語で入力してください' required><br /><br />";
		echo "一行キャッチコピー：<input type='text' size='15' NAME='jobInfo[]' style='font-family:Tahoma;' pattern='^[ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９、。! ！\n\r\s]+$' title='入力してください' required><br /><br />";
		echo "紹介文：<input type='text' size='15' NAME='jobInfo[]' style='font-family:Tahoma;' pattern='^[ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９、。! ！\n\r\s]+$' title='入力してください' required><br /><br />";
		echo "写真1：<input type='file' name='upfile' size='30' /><br /><br />";
		echo "写真2：<input type='file' name='upfile2' size='30' /><br /><br /></center>";


			echo "<div class='left'><H4>連携させたい中分類タグを選択してください</H4>";
					$tagAll = tagSelectAllKubun("1");	//指定された区分のタグ全てを取得
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。
					foreach($tagAll as $data){
					echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."'>". $data[1]."<br>";
					}

			echo "<H4>連携させたい感覚タグを選択してください</H4>";
					$tagAll = tagSelectAllKubun("2");	//指定された区分のタグ全てを取得
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。
					foreach($tagAll as $data){
					echo "<input name='Renkei[]' type='checkbox' value='".$data[0]."'>". $data[1]."<br>";
					}

			echo "<H4>関連する学科を選択してください</H4>";
					$SchoolAll = getDepartmentAll();	//指定された区分のタグ全てを取得
					//１ループでタグ1つがチェックボックス形式で表示され、データが無くなるとループを抜けます。
					foreach($SchoolAll as $data){
					echo "<input name='RenkeiSchool[]' type='checkbox' value='".$data[0]."'>". $data[2]."<br>";
					}
			echo "<br /></div>";
	}else{


		echo "<center><form action=commentInsert.php method =POST enctype='multipart/form-data' onsubmit='return disp()'>";
			if ($_POST['jobUpd'] == 1) { echo "学生インタビュー : ";}
			if ($_POST['jobUpd'] == 2) { echo "専門家のコメント : ";}
			if ($_POST['jobUpd'] == 3) { echo "レポート : ";}
			
		echo "<br /><textarea name=report cols=50 rows=5 style='font-family:Tahoma; ime-mode:disabled;' pattern='^[ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９、。! ！ \n\r\s]+$' title='文字を入力してください' required></textarea><br /><br />";
		echo "写真：<input type='file' name='upfile' size='30' /><br /><br />";
		echo "<H2>追加する職業を選択してください。</H2></center>";
		//１ループでタグ1つがボタン形式で表示され、データが無くなるとループを抜けます。
				foreach($jobAll as $data){
				echo "<div class='left'><input type='radio' name='selectedJob' value='".$data[0]."'>". $data[1] ."<br /></div>";
				}
		echo "<input type='hidden' name='school' value='".$_POST['jobUpd']."'>";
	}
		echo "<br /></div><center><input type =submit value=追加>";
		echo "</form>";

//データベース切断
dconnect($con);

?>
		</center>
	</body>
</html>