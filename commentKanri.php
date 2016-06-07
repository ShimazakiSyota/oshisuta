<html>
	<head>
		<div class="head">
		<title>管理者</title>
		<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>管理職業選択</h1>
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
<center>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認

		
		//選択された職業情報の取得
		$jobKanri = joblist ($_POST['selectedJob']);

		//コメント変更用情報取得
		$jobstadiumlist = getcoment($jobKanri[0],$_POST['KanriJobType']);

		echo "<br /><h3>職業名<br />" . $jobKanri['JOBNAME'] ."</h3>";

		//学生インタビューの変更処理
		if($_POST['KanriJobType'] == 1){
			foreach($jobstadiumlist as $value ){
		echo "<form action='./commentUpdate.php' method='post' enctype='multipart/form-data' onsubmit='return disp()'>";
		echo "<h4>学生インタビュー<br /><textarea name=report cols=50 rows=5>".$value['INTERVIEW']."</textarea><br /><br />";
		echo "<H4>変更する場合は画像を選択してください</H4>";
		echo "写真：<input type='file' name='upfile' size='30' /><br /><br />";
		//画像がある場合のみ
   		if($value['SIMAGE'] != 0) {
       		echo "画像1<br><img height='100' src='./create_image.php?id=".$value['SIMAGE']."' />";
		}
		echo "<input type='hidden' name='picID' value='".$value['SIMAGE']."'>";
		echo "<input type='hidden' name='commentID' value='".$value['STUDENTID']."'>";
		echo "<input type='hidden' name='KanriJobType' value='".$_POST['KanriJobType']."'>";	
		echo "<br /><input type=submit value=変更><br /><br />";
		echo"</form>";
			}
		}
		

		//専門家のコメントの変更処理
		if($_POST['KanriJobType'] == 2){
			foreach( $jobstadiumlist as $value ){
		echo "<form action='./commentUpdate.php' method='post' enctype='multipart/form-data' onsubmit='return disp()'>";
		echo "<h4>専門家のコメント</h4><textarea name=report cols=50 rows=5>".$value['EXPERTCM']."</textarea><br /><br />";
		echo "<H4>変更する場合は画像を選択してください</H4>";
		echo "写真：<input type='file' name='upfile' size='30' /><br /><br />";
		//画像がある場合のみ
   		if($value['EIMAGE'] != 0) {
       		echo "写真：<img height='100' src='./create_image.php?id=".$value['EIMAGE']."' />";
		}
		echo "<input type='hidden' name='picID' value='".$value['EIMAGE']."'>";
		echo "<input type='hidden' name='commentID' value='".$value['EXPERTID']."'>";
		echo "<input type='hidden' name='KanriJobType' value='".$_POST['KanriJobType']."'>";
		echo "<br /><br /><input type=submit value=変更><br /><br />";
		echo"</form>";
			}
		}

		//レポートの変更処理
		if($_POST['KanriJobType'] == 3){
			foreach( $jobstadiumlist as $value ){
		echo "<form action='./commentUpdate.php' method='post' enctype='multipart/form-data' onsubmit='return disp()'>";
		echo "<h4>レポート</h4><textarea name=report cols=50 rows=5>".$value['REPORT']."</textarea><br /><br />";
		echo "<H4>変更する場合は画像を選択してください</H4>";
		echo "写真：<input type='file' name='upfile' size='30' /><br /><br />";
		//画像がある場合のみ
   		if($value['WIMAGE'] != 0) {
       		echo "写真：<img height='100' src='./create_image.php?id=".$value['WIMAGE']."' />";
		}
		echo "<input type='hidden' name='picID' value='".$value['WIMAGE']."'>";
		echo "<input type='hidden' name='commentID' value='".$value['WORKID']."'>";
		echo "<input type='hidden' name='KanriJobType' value='".$_POST['KanriJobType']."'>";
		echo "<br /><input type=submit value=変更><br /><br />";
		echo"</form>";
			}
		}
	
			dconnect($con); //データベース切断
		?>
		</center>
	</body>
</html>