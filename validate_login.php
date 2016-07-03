<?php

	function check_data($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['name']) && isset($_POST['pass_me']) && !empty($_POST['name']) && !empty($_POST['pass_me'])) {
			$name = check_data($_POST['name']);
			$pass_me = check_data($_POST['pass_me']);

			$uname_err = "";
			$pass_me_err = "";

			if (preg_match('/^[a-zA-Z0-9]*$/', $name) && !preg_match('/^[a-z0-9]*$/', $name) && !preg_match('/^[A-Z0-9]*$/', $name) && !preg_match('/^[0-9]*$/', $name)) {
				$flag_pass = true;
			}else{
				$uname_err = "Username should at least contain one Capital letter , one small letter and one numeric digit\n";
			}

			if (preg_match('/^[a-zA-Z0-9]*$/', $pass_me)) {
				$flag_usr = true;
			}else{
				$pass_me_err = "Password should not contain ant special character";
			}

			if(empty($uname_err) && empty($pass_me_err)) {
				$pass_me_md = md5($pass_me);
				$query = "SELECT `id` FROM `users` WHERE `username` = '".mysqli_real_escape_string($db_link,$name)."' AND `password` = '".mysqli_real_escape_string($db_link,$pass_me_md)."'";

				if($query_run = mysqli_query($db_link , $query)) {
					$len = mysqli_num_rows($query_run);
					if ($len) {
						$arr = mysqli_fetch_assoc($query_run);
						$arr = $arr['id'];

						if(isset($_POST['remember'])) {
							setcookie('id',$arr,time() + 60*60*24*365);
							setcookie('name',$name,time() + 60*60*24*365);

						}

						$_SESSION['id'] = $arr;
						$_SESSION['name'] = $name;
						header('Location:home.php');
						
					}else {
						$err_login = "Username and password not matched";
					}
				}

			}

		}
	}
?>