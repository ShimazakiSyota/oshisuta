<html>
	<head>
		<div class="head">
		<title>職業追加</title>
		<link href="kanristyle.css" rel="stylesheet" type="text/css">
	</head>
<body>
		<h1>追加したい項目を選択してください。</h1>
	<div align="right">
		<h3><a href='./kanri.php'>管理TOPページへ戻る</a><br></h3>
		<h3><a href='./jobTop.php'>職業TOPページへ戻る</a><br></h3>
		</div></div>

<?php
	
	session_start(); //session開始

	require_once 'DBmanager.php'; //DB読込
	$con = connect(); //DB接続
	dconnect($con); //データベース切断

	
?>
	<center>
		<form action=jobMake2.php method=post>
			<br /><select name="jobUpd">
			<option value="0">職業詳細</option><br />
			<option value="1">学生インタビュー</option><br />
			<option value="2">専門家のコメント</option><br />
			<option value="3">レポート</option><br /><br />
			</select>
			<input type="submit" value="送信"/>
		</form>

	</center>

	</body>
</html>
