<html>
	<head>
		<meta http-equiv="REFRESH" content="10000000000;URL=./jobTop.php">
		<title>�E�ƒǉ�</title>
	</head>
	<body>
			<?php

			session_start(); //session�J�n

			require_once 'DBmanager.php'; //DB�}�l�[�W���[�̓ǂݍ���
			$con = connect(); //�f�[�^�x�[�X�ڑ�

			sessionCheck($_SESSION['id'],$_SESSION['pass']);//�Z�b�V�����̊m�F
			date_default_timezone_set('Asia/Tokyo');

		$jobid = $_POST['report'];
		$time = date("Y-m-d H:i:s");
		$KanriName = sessionName($_SESSION['id'],$_SESSION['pass']);
			//���Əڍ�
			$expert = expertInsert($_POST['expert'],$_FILES['upfile2'],$time,$KanriName[0]);

			//���ƃR�����g�̒ǉ�
			$xyz = studentviewInsert($_POST['expert2'],$_POST['expert3'],$_FILES['upfile3'],$expert);

		echo "�R�����g��ǉ����܂���";

		dconnect($con); //�f�[�^�x�[�X�ؒf
			?>
	</body>
</html>