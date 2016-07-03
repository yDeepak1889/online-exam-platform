<?php
	function check($data) {
		$data = trim ($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

	if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_pass']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])&& !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['re_pass'])) {
		$first_name = check($_POST['first_name']);
		$last_name =  check($_POST['last_name']);
		$username = check($_POST['username']);
		$password = check($_POST['password']);
		$re_pass = check($_POST['re_pass']);

		$name_err = "";
		$pass_err = "";
		$username_err = "";
		$pass_match = "";

		if (!preg_match('/^[a-z A-Z]*$/', $first_name) || !preg_match('/^[a-z A-Z]*$/', $last_name)) {
			$name_err = "Name should only contain english alphabet\n";
		}

		if (preg_match('/^[a-zA-Z0-9]*$/', $username) && !preg_match('/^[a-z0-9]*$/', $username) && !preg_match('/^[A-Z0-9]*$/', $username) && !preg_match('/^[0-9]*$/', $username)) {
			$flag_pass = true;
		}else{
			$username_err = "Username should at least contain one Capital letter , one small letter and one numeric digit\n";
		}

		if (preg_match('/^[a-zA-Z0-9]*$/', $password)) {
			$flag_usr = true;
		}else{
			$pass_err = "Password should not contain ant special character";
		}

		if ($password !== $re_pass) {
				$pass_match = "Both Password should match\n";
		}	

		if (empty($name_err) && empty($pass_err) && empty($username_err) && empty($pass_match)) {
				
				$query0 = "SELECT `username` FROM `users` WHERE `username` = '$username'";

				$query_run0 = @mysqli_query($db_link, $query0);

				$len = @mysqli_num_rows($query_run0);

				if ($len) {
					$username_err = "Username already exists";
				}else {
					$password_md = md5($password);
					$query = "INSERT INTO `users` VALUES ('','$first_name','$last_name','$username','$password_md')";
					//echo $query;

					$query_run = @mysqli_query($db_link, $query);

					if (!$query_run) {
						echo "<script>alert('Sign Up Unsuccessful')</script>";
					}else {
						unset($password);
						unset($password_md);
						unset($username);
						unset($re_pass);
						unset($first_name);
						unset($last_name);
						echo "<script>alert('Successfully signed Up')</script>";
					}
				}
		}

	}
?>