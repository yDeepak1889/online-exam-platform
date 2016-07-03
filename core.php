<?php
	session_start();

	function check_login() {
		if ((isset($_SESSION['id']) && !empty($_SESSION['id'])) || (isset($_COOKIE['id']) && !empty($_COOKIE['id']))) {
			return true;
		}else {
			return false;
		}
	}



?>