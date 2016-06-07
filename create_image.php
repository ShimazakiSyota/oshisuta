<?php
//DB読込
require_once 'DBmanager.php';

//DB接続
$con = connect();

//受け取った画像のIDを元に画像をデータベースから取得
    //バイナリデータ
    	$img = picGet($_GET['id']);
        header( 'Content-Type: ".$img[2]."');
        echo $img[1];
		
 //データベース切断
dconnect($con);

?>