<?php
function connect(){//データベースに接続

    try {
//データベースに接続 //
$con = mysql_connect("localhost", "root","");

//データベースを選択//
mysql_select_db("test2", $con);

//文字コードをセット//
mysql_query('SET NAMES utf8', $con );

return $con;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function dconnect($con){//データベース切断
    try {
	
	$con2 = mysql_close($con);
		if (!$con2) {
			  exit('データベースとの接続を閉じられませんでした。');
		}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function sessionCheck($id,$pass){//セッション確認、ログイン認証

    try {
	//SQL文をセット//
	$con2 = mysql_query('SELECT PASS FROM user where ID = '.$id);
		if (!$con2) {
    	header( "Location: ./sessionMisu.php" ) ;
		}
	$row = mysql_fetch_assoc($con2);
		if($row['PASS'] != $pass){
			header( "Location: ./sessionMisu.php" ) ;
		}
    } catch (Exception $e) {
            header( "Location: ./sessionMisu.php" ) ;
    }
}

function tagSelectAllKubun($kubun){//指定されたタグ区分に該当するすべてのタグを取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT * FROM tag where TAGDIV ='.$kubun);
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function tagCheck($tagId){//指定されたタグ情報を取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT * FROM tag where TAGID ='.$tagId);
		$data = mysql_fetch_array($queryset);
		return $data;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function tagKanri($tagId){//指定されたタグに関連する項目を取得

    try {
	$tagKanri = array();
		$arr = tagCheck($tagId);
		array_push($tagKanri, $arr);
		if ($arr[2] != 2) {
			if ($arr[2] == 1) {
			$arr2 = tagSelectAllKubun('0');
			array_push($tagKanri, $arr2);
			}else{
			$arr2 = tagSelectAllKubun('1');
			array_push($tagKanri, $arr2);
			}
		$arr3 = tagRelationSelect($tagId);
		array_push($tagKanri, $arr3);
		}
		
		if ($arr[2] != 0) {
		$arr4 = jobAll();
		array_push($tagKanri, $arr4);
		$arr5 = jobRelationSelect($tagId);
		array_push($tagKanri, $arr5);
		}
		return $tagKanri;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function jobAll(){//全ての職業情報を取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT * FROM job');
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function tagRelationSelect($tagId){//選択されたのタグに関連するタグIDを取得

    try {$arr = tagCheck($tagId);
	//SQL文をセット//
		$queryset = mysql_query('SELECT HIGHTAG FROM tagmg where LOWTAG ='.$tagId);
		if ($arr[2] == 0) {
			$queryset = mysql_query('SELECT LOWTAG FROM tagmg where HIGHTAG ='.$tagId);
		}
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function jobRelationSelect($tagId){//選択されたのタグに関連する職業IDを取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT JOBID FROM tagjob where TAGID ='.$tagId);
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function tagDelete($tagId){//選択されたのタグの削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM tag WHERE TAGID ='.$tagId);
		trDelete($tagId);
		tjrDelete($tagId);
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function tjrDelete($tagId){//選択されたのタグの、タグ職業関連を削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM tagjob WHERE TAGID ='.$tagId);

			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function trDelete($tagId){//選択されたのタグの、タグ関連を削除

    try {$arr = tagCheck($tagId);
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM tagmg WHERE HIGHTAG ='.$tagId);
		if ($arr[2] == 1) {
		$result_flag = mysql_query('DELETE FROM tagmg WHERE LOWTAG ='.$tagId);
		}
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function joblist($jobId){//選択されたの職業の職業情報を取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT * FROM job where JOBID ='.$jobId);
		$data = mysql_fetch_array($queryset);
		return $data;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function trRelation($tagId,$tagId2){//タグ関連の追加

    try {$arr = tagCheck($tagId);
	//SQL文をセット//
		$result_flag = mysql_query("INSERT INTO tagmg (HIGHTAG, LOWTAG) VALUES ('$tagId','$tagId2')");
		if ($arr[2] == 1) {
		$result_flag = mysql_query("INSERT INTO tagmg (HIGHTAG, LOWTAG) VALUES ('$tagId2','$tagId')");
		}
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function tjrRelation($tagId,$jobID){//タグ職業関連の追加

    try {
	//SQL文をセット//

	$result_flag = mysql_query("INSERT INTO tagjob (JOBID, TAGID) VALUES ('$jobID','$tagId')");
		
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function tagUpdate($tagZyoho){//タグの更新

    try {
	//SQL文をセット//
		$result_flag = mysql_query("UPDATE tag SET TAGNAME = '$tagZyoho[1]' WHERE TAGID = '$tagZyoho[0]'");
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function tagInsert($tagZyoho){//タグの追加
    try {
	//SQL文をセット//
		$result_flag = mysql_query("INSERT INTO tag (TAGNAME,TAGDIV) VALUES ('$tagZyoho[0]','$tagZyoho[1]')");
		
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
		return maxTag();
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function maxTag(){//最終更新したタグのID取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT MAX(TAGID) as value FROM tag');
 		$data = mysql_fetch_assoc($queryset);
		return $data['value'];
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function jDelete($jobID){//選択されたのタグの削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM job WHERE JOBID ='.$jobID);
		jtrDelete($jobID);
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function jtrDelete($jobID){//選択されたのタグの、タグ職業関連を削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM tagjob WHERE JOBID ='.$jobID);

			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function jobTagRelationSelect($jobID){//選択されたの職業の職業情報を取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT TAGID FROM tagjob where JOBID ='.$jobID);
		$arr = array();
			while ($data = mysql_fetch_array($queryset)){
			array_push($arr, tagCheck($data[0]));
			}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function lowtagName($jobID){

    try {
	$data = jobTagRelationSelect($jobID);
	$arr = array();
	foreach($data as $tag){
		if($tag[2]==1){
			array_push($arr, $tag);
		}
	}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function imageName($jobID){

    try {
	$data = jobTagRelationSelect($jobID);
	$arr = array();
	foreach($data as $tag){
		if($tag[2]==2){
			array_push($arr, $tag);
		}
	}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function jobKanri($jobId){//指定されたタグに関連する項目を取得

    try {
	$jobKanri = array();
		$arr1 = tagSelectAllKubun(1);
		array_push($jobKanri, $arr1);
		
		$arr2 = lowtagName($jobId);
		array_push($jobKanri, $arr2);

		$arr3 = tagSelectAllKubun(2);
		array_push($jobKanri, $arr3);
		
		$arr4 = imageName($jobId);
		array_push($jobKanri, $arr4);
		
		return $jobKanri;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function stviewlist($jobid){//学生インタビュー情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT * FROM studentiv WHERE JOBID ='.$jobid);
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}



function jobstadiumlist($jobid){//お仕事スタジアムレポート情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT * FROM workｒｐ WHERE JOBID ='.$jobid);
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}


function expertlist($jobid){//専門家情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT * FROM expert WHERE JOBID ='.$jobid);
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function rank(){//{気になるランキング

    try {
		$queryset = mysql_query('SELECT job.JOBID,job.JOBNAME,COUNT(good.JOBID) AS CJOBID FROM job,good WHERE job.JOBID =good.JOBID GROUP BY good.JOBID ORDER BY CJOBID DESC,JOBID');
		$arr = array();
			while ($data = mysql_fetch_array($queryset)){
			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function kie($fkie){//フリーワード検索

   try {
	$text1 = $fkie;
	$sql ="SELECT JOBID,JOBNAME,JOBCC FROM job";
	//キーワードが入力されているときはwhere以下を組み立てる
	if (strlen($text1)>0){
		//受け取ったキーワードの全角スペースを半角スペースに変換する
		$text2 = str_replace("　", " ", $text1);

		//キーワードを空白で分割する

		$array1 = explode(" ",$text2);
		//分割された個々のキーワードをSQLの条件where句に反映する
		$where = " WHERE ";
		for($i = 0; $i < count($array1);$i++){
			$where .= "JOBNAME LIKE '%".$array1[$i]."%'";
			$where .= "OR JOBJPN LIKE '%".$array1[$i]."%'";
			$where .= "OR JOBENG LIKE '%".$array1[$i]."%'";
			$where .= "OR JOBCC LIKE '%".$array1[$i]."%'";
			$where .= "OR JOBINTRO LIKE '%".$array1[$i]."%'";
			if ($i <count($array1) -1){
				$where .= " AND ";
			}
		}
	}
		$sql .= $where;
		$sql .= ";";
	$queryset = mysql_query($sql);
		$arr = array();

			while ($data = mysql_fetch_array($queryset)){

			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function order($arry){//50音検索

   try {
	$sql ="SELECT JOBID,JOBNAME,JOBCC FROM job";

	$where = " WHERE ";
	foreach($arry as $data){
		$where .= "JOBJPN LIKE '".$data."%'";

		$where .= " OR ";

	}
        //最後の余分なORを消す。
	$where = substr($where, 0, -3);

		$sql .= $where;
		$sql .= ";";
	$queryset = mysql_query($sql);
		$arr = array();

			while ($data = mysql_fetch_array($queryset)){

			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function orders($sss){//50音検索

   try {
	$sql ="SELECT JOBID,JOBNAME,JOBCC FROM job WHERE JOBJPN LIKE '".$sss."%'";



	$queryset = mysql_query($sql);
		$arr = array();

			while ($data = mysql_fetch_array($queryset)){

			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}



function studentnull($jobid){//学生インタビューがあるかないか(ある場合1以上、ない場合" "を返す)
   try {
		$queryset = mysql_query('SELECT COUNT(JOBID) FROM studentiv WHERE JOBID ='.$jobid);
			$arr = array();
			while ($data = mysql_fetch_array($queryset)){
			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function expertnull($jobid){//専門家があるかないか(ある場合1以上、ない場合" "を返す)
   try {
		$queryset = mysql_query('SELECT COUNT(JOBID) FROM expert WHERE JOBID ='.$jobid);
			$arr = array();
			while ($data = mysql_fetch_array($queryset)){
			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function workrpnull($jobid){//学生インタビューがあるかないか(ある場合1以上、ない場合" "を返す)
   try {
		$queryset = mysql_query('SELECT COUNT(JOBID) FROM workｒｐ WHERE JOBID ='.$jobid);
			$arr = array();
			while ($data = mysql_fetch_array($queryset)){
			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
//気になる登録
function goodIn($jobid,$tid){
	try{
		$queryset = mysql_query('INSERT INTO good (JOBID,TINFO) VALUES ('.$jobid.','.$tid.')');
    	} catch (Exception $e) {
          	echo ('システムエラーが発生しました');
    	}

}

//気になる取消
function goodDel($jobid,$tid){
	try{
		$queryset = mysql_query('DELETE FROM good WHERE JOBID='.$jobid.' AND TINFO='.$tid);
    	} catch (Exception $e) {
          	echo ('システムエラーが発生しました');
    	}

}


//気になる検索
function goodSearch($jobid,$tid){
    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT TINFO FROM good WHERE JOBID ='.$jobid.' AND TINFO='.$tid);

		return $queryset;

    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}


//端末情報tableから番号の取得
function terminal(){
    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT TID FROM terminal');
		$data= mysql_result($queryset,0);
		return $data;

    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

//端末情報table番号更新
function terminalup($terminal){
    try {
	//SQL文をセット//
		$queryset = mysql_query('UPDATE terminal SET TID='.$terminal);
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

//端末にcookie登録確認
function cookie(){
//cookie情報取得
	if(isset($_COOKIE['test'])){
		//cookie登録されている
	}else{
		//cookie登録されていない
		$queryset=terminal();
		$queryset=$queryset++;
		//cookie登録↓
		$flag = setcookie('test',$queryset,time()+ 2 * 365 * 24 * 3600);
		//端末番号最後尾更新
		terminalup($queryset);
		

	}
}

//気になる画像切り替え時処理
function good($jobid,$tid){
	$quryset=goodSearch($jobid,$tid);
	$data = mysql_fetch_row($quryset);

		if($data>0){
		//気になるがある場合
		goodDel($jobid,$tid);
		}else{
		//気になるがない場合
		goodIn($jobid,$tid);
		}
}

function comentInsert($school,$text,$jid,$upfile){//タグの追加
    try {
		$fileID = picSet($upfile);
		$result_flag;
		if($school==1){
			$result_flag = mysql_query("INSERT INTO studentiv (INTERVIEW,JOBID,SIMAGE) VALUES ('$text','$jid','$fileID')");
		}
		if($school==2){
			$result_flag = mysql_query("INSERT INTO expert (EXPERTCM,JOBID,EIMAGE) VALUES ('$text','$jid','$fileID')");
		}
		if($school==3){
			$result_flag = mysql_query("INSERT INTO workｒｐ (REPORT,JOBID,WIMAGE) VALUES ('$text','$jid','$fileID')");
		}
		if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
		}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
//更新
function comentUpdate($school,$text,$textid){
    try {
	$result_flag;
		if($school==1){
		$result_flag = mysql_query("UPDATE studentiv SET INTERVIEW = '$text' WHERE STUDENTID = '$textid'");
		}
		if($school==2){
		$result_flag = mysql_query("UPDATE expert SET EXPERTCM = '$text' WHERE EXPERTID = '$textid'");
		}
		if($school==3){
		$result_flag = mysql_query("UPDATE work r ｐ SET REPORT = '$text' WHERE WORKID = '$textid'");
		}
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}

    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function getcoment($jobID,$school){//コメント変更用情報取得

    try {
	$arr = array();
	$queryset;
		if($school==1){$queryset = mysql_query('SELECT * FROM studentiv WHERE JOBID ='.$jobID);}
		if($school==2){$queryset = mysql_query('SELECT * FROM expert WHERE JOBID ='.$jobID);}
		if($school==3){$queryset = mysql_query('SELECT * FROM workｒｐ WHERE JOBID ='.$jobID);}
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;

    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function jobInsert($jobInfo,$upfile,$upfile2){//お仕事登録
    try {
	$fileID = picSet($upfile);
	$fileID2 = picSet($upfile2);
	//SQL文をセット//
		$result_flag = mysql_query("INSERT INTO job (JOBNAME,JOBJPN,JOBENG,JOBCC,JOBINTRO,JIMAGE,JIMAGE2) VALUES ('$jobInfo[0]','$jobInfo[1]','$jobInfo[2]','$jobInfo[3]','$jobInfo[4]','$fileID','$fileID2')");
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
			}
		return maxJob();
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function maxJob(){//最終更新した職業のID取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT MAX(JOBID) as value FROM job');
 		$data = mysql_fetch_assoc($queryset);
		return $data['value'];
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function picSet($upfile){//画像の設定

    try {
    //バイナリデータ
    $fp = fopen($upfile["tmp_name"], "rb");
    $imgdat = fread($fp, filesize($upfile["tmp_name"]));
    fclose($fp);
    $imgdat = addslashes($imgdat);

    //拡張子
    $dat = pathinfo($upfile["name"]);
    $extension = $dat['extension'];

    // MIMEタイプ
    if ( $extension == "jpg" || $extension == "jpeg" ) $mime = "image/jpeg";
    else if( $extension == "gif" ) $mime = "image/gif";
    else if ( $extension == "png" ) $mime = "image/png";
	
	//
		$result_flag = mysql_query("INSERT INTO `image` (`IMAGE`, `MIME`) VALUES ('$imgdat', '$mime')");
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
			}
	return mysql_insert_id();

    }catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function jobUpdate($jobID,$jobInfo){//タグの更新

    try {
	jtrDelete($jobID);
	jobmgDelete($jobID);
	//SQL文をセット//
		$result_flag = mysql_query("UPDATE job SET JOBNAME = '$jobInfo[0]' , JOBJPN = '$jobInfo[1]' , JOBENG = '$jobInfo[2]' , JOBCC = '$jobInfo[3]' , JOBINTRO = '$jobInfo[4]' WHERE JOBID = '$jobID'");
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function picGet($id){//タグの更新

    try {
	//SQL文をセット//
		$result = mysql_query("SELECT * FROM image WHERE IMAID = ".$id);
    	$data = mysql_fetch_row($result);
		return $data;
	    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function picUpd($upfile,$id){//画像の更新

    try {
    //バイナリデータ
    $fp = fopen($upfile["tmp_name"], "rb");
    $imgdat = fread($fp, filesize($upfile["tmp_name"]));
    fclose($fp);
    $imgdat = addslashes($imgdat);

    //拡張子
    $dat = pathinfo($upfile["name"]);
    $extension = $dat['extension'];

    // MIMEタイプ
    if ( $extension == "jpg" || $extension == "jpeg" ) $mime = "image/jpeg";
    else if( $extension == "gif" ) $mime = "image/gif";
    else if ( $extension == "png" ) $mime = "image/png";
	
		$result_flag = mysql_query("UPDATE image SET IMAGE='$imgdat' , MIME='$mime' WHERE IMAID = '$id'");
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    }catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function sbjctImgResult($tagID){//分野とイメージ結果
   try {
			$arr = array();
		$tag = tagCheck($tagID);
		if ($tag[2] == 0){
			 $tag1 = tagRelationSelect($tagID);
			foreach($tag1 as $data){
			$jobid = jobRelationselect($data[0]);
				foreach($jobid as $data1){
				$jobid1 = joblist($data1[0]);
				$flag = 0;
						foreach($arr as $data2){
							if($data2[0]==$jobid1[0]){
							$flag = 1;
							}
						}
					if($flag==0){
					array_push($arr, $jobid1);
					}
				}
			}
		}else{
			$jobid = jobRelationselect($tagID);
			foreach($jobid as $data1){
			$jobid1 = joblist($data1[0]);
			array_push($arr, $jobid1);
			}
		}
		
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
///////////////////////////////////////////書き直し
function asolist($jobID){//学校情報取得

    try {
	$arr = array();
	//SQL文をセット//
		$list = getDepartmentID($jobID);
			foreach($list as $data){
				$list2 = getDepartment($data[0]);
				$list3 = getSchool($list2[0]);
				$array = array($list3[1],$list2[2],$list2[3]);
				array_push($arr, $array);
			}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
////////////////////////////////////////////////
function getDepartmentID($jobid){//学校情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT DEPARTMENTID FROM jobmg WHERE JOBID ='.$jobid);
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function getDepartmentJobID($id){//学校情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT JOBID FROM jobmg WHERE DEPARTMENTID ='.$id);
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function getDepartment($departmentID){//学校情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT * FROM department WHERE DEPARTMENTID ='.$departmentID);
		$data = mysql_fetch_array($queryset);
		return $data;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function getSchool($schoolID){//学校情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT * FROM school WHERE SCHOOLID ='.$schoolID);
		$data = mysql_fetch_array($queryset);
		return $data;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function getSchoolAll(){//学校情報取得

    try {
	//SQL文をセット//00
		$queryset = mysql_query('SELECT * FROM school');
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function getDepartmentAll(){//学校情報取得

    try {
	//SQL文をセット//
		$queryset = mysql_query('SELECT * FROM department');
		$arr = array();
		while ($data = mysql_fetch_array($queryset)){
		array_push($arr, $data);
		}
		return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function jobSchoolRelationInsert($jobID,$departmentID){//タグ職業関連の追加

    try {
	//SQL文をセット//

	$result_flag = mysql_query("INSERT INTO jobmg (JOBID, DEPARTMENTID) VALUES ('$jobID','$departmentID')");
		
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function jobmgDelete($jobID){//選択されたのタグの、タグ職業関連を削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM jobmg WHERE JOBID ='.$jobID);

			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function jobmgDelete2($id){//選択されたのタグの、タグ職業関連を削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM jobmg WHERE DEPARTMENTID ='.$id);

			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
////////////////////////////////////////書き直し
//学校登録
function schoolInsert($schoolInfo){
    try {
	//SQL文をセット//
		$result_flag = mysql_query("INSERT INTO school (SNAME,FLAG) VALUES ('$schoolInfo[0]','$schoolInfo[1]')");
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
			}
		return mysql_insert_id();
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
/////////////////////////////////////////
/////////////////////////////////////////書き直し
function departmentInsert($name,$school){//学科の登録
    try {
	//SQL文をセット//
		$result_flag = mysql_query("INSERT INTO department (SCHOOLID,DNAME,URL) VALUES ('$school','$name','$url')");
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysql_error());
			}
		return mysql_insert_id();
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
/////////////////////////////////////////
function SchoolRelationUpdate($departmentID,$schoolID){
	try{
		$result_flag = mysql_query("UPDATE department SET SCHOOLID = '$schoolID' WHERE DEPARTMENTID = '$departmentID'");
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
//////////////////////////////////////////////////////書き直し
//学校の変更
function schoolUpdate($school){
	try{
		$result_flag = mysql_query("UPDATE school SET SNAME = '$school[1]' , FLAG = '$school[2]' WHERE SCHOOLID = '$school[0]'");
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////書き直し
//学科の変更
function departmentUpdate($school){
	try{
	jobmgDelete2($school[0]);
		$result_flag = mysql_query("UPDATE department SET DNAME = '$school[1]' , URL = '$school[2]',SCHOOLID = '$school[3]' WHERE DEPARTMENTID = '$school[0]'");
			if (!$result_flag) {
	    	die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
//////////////////////////////////////////////////////
function recently($re){//最近気になった仕事

    try {
		$queryset = mysql_query("SELECT job.JOBID,job.JOBNAME FROM job,good WHERE job.JOBID =good.JOBID AND good.TINFO LIKE '%".$re."%' GROUP BY good.JOBID ");
		$arr = array();
			while ($data = mysql_fetch_array($queryset)){
			array_push($arr, $data);
			}
	return $arr;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function jobmgJobDelete($jobID){//選択されたのタグの削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM jobmg WHERE JOBID ='.$jobID);
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function jobmgdepartmentDelete($departmentID){//選択されたのタグの削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM jobmg WHERE DEPARTMENTID ='.$departmentID);
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function departmentDelete($departmentID){//選択されたのタグの削除

    try {
	jobmgdepartmentDelete($departmentID);
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM department WHERE DEPARTMENTID ='.$departmentID);
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
function schoolDelete($schoolID){//選択されたのタグの削除

    try {
	//SQL文をセット//
		$result_flag = mysql_query('DELETE FROM school WHERE SCHOOLID ='.$schoolID);
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}
?>   