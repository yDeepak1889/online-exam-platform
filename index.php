<?php
	require('core.php');

	if (check_login()) {
		if(isset($_SESSION['topic'])) {

			header('Location:start_quiz.php');
		}else 
			if(isset($_COOKIE['id']) && isset($_COOKIE['name'])) {
				
				$_SESSION['id'] = $_COOKIE['id'];
				$_SESSION['name'] = $_COOKIE['name'];
			}

			header('Location:home.php');
	}else {
		require('login.php');
	}
?>