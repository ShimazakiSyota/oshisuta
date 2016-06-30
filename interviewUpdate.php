<html>
	<head>
		<meta http-equiv="REFRESH" content="10000000;URL=./jobTop.php">
		<title>職業追加</title>
	</head>
	<body>
			<?php

			session_start(); //session開始

			require_once 'DBmanager.php'; //DBマネージャーの読み込み
			$con = connect(); //データベース接続

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//セッションの確認
			date_default_timezone_set('Asia/Tokyo');
			$time = date("Y-m-d H:i:s");//時間の取得
			$KanriName = sessionName($_SESSION['id'],$_SESSION['pass']);//更新者取得
			$comment = cstviewlist($_POST['studentID']);

			//コメント変更用情報の更新
			interviewUpdate($_POST['interview'],$time,$KanriName[0],$_POST['studentID']);

			//画像ファイルの更新
			if (is_uploaded_file($_FILES["upfile"]["tmp_name"])){
				picUpd($_FILES['upfile'],$_POST['picID']);
			}
		for ($i=0; $i<10; $i++){
			if (isset($_POST['interview2'][$i] ) && ($_POST['interview2'][$i] != "")){
			if (isset($comment[$i][3])){
				//コメントの更新
				studentviewUpdate($_POST['interview2'][$i],$_POST['interview3'][$i],$comment[$i][3]);
				}else{
				//コメントの追加
				studentviewInsert2($_POST['interview2'][$i],$_POST['interview3'][$i],$_FILES['upfile1'],$_POST['studentID'],$i);
				}
			}
		}

		for ($i=0; $i<10; $i++){
			//コメントの画像更新
			if(isset($comment[$i][0])){
				//画像ファイルの更新
				if (is_uploaded_file($_FILES["upfile1"]["tmp_name"][$i])) {
					picUpd2($_FILES['upfile1'],$i,$comment[$i][0]);
			}else{
				$picIn = picSet2($_FILES['upfile1'],$i);
				picInsert($picIn);
				}
			}
		}

		echo "コメントを更新しました";

		dconnect($con); //データベース切断
			?>
	</body>
</html>