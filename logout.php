<?php
	session_start();
	ob_start();

	session_destroy();
	if (isset($_COOKIE['id'])) {
		$data1 = $_COKKIE['id'];
		setcookie('id',$data1, time()-100000);
	}

	if(isset($_COKKIE['name'])) {
		$data2 = $_COOKIE['name'];
		setcookie('name', $data2, time()-10000);
	}

	header('Location:index.php');
?>