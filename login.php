<?php
	@session_start();
	@ob_start();
	
	require('db_connect.php');
	require('validate_login.php');
	if ((isset($_SESSION['id']) && !empty($_SESSION['id'])) || (isset($_COOKIE['id']) && !empty($_COOKIE['id']))) {
		header('Location: index.php');
	}else {
?>

<!DOCTYPE html>

<html lang = "en">
<head> 

	<title>Profile|Login</title>

	<link rel = "icon" type = "image/gif" src = "yDeepak1889.jpg" sizes = "16x16">
	<meta charset = "utf-8">

	<meta name = "viewport" content = "width=device-width, initial-scale=1" >

	<link rel = "stylesheet" type = "text/css" href = "style_main.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<script type="text/javascript" src="js/jquery.js"></script>

	
	</head>

<body>
	<div class = "container" id = "main">
		<span style = "color:red;"><?php if (isset($err_login)) echo $err_login; ?></span>
		<form class = "form-horizontal" role = "form" action = "<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
			<div class = "form-group ">
					<label class = "control-label col-md-2">Username</label>

					<div class = "col-md-10">
						<span style = "color:red;"><?php if (isset($uname_err)) echo $uname_err; ?></span>
						<input  class = "form-control" type = "text" name = "name" value = "" placeholder = "Enter Username" required>
					</div>
			</div>

			<div class = "form-group ">
					<label class = "control-label col-md-2">Password</label>

					<div class = "col-md-10">
						<span style = "color:red;"><?php if (isset($pass_me_err)) echo $pass_me_err; ?></span>
						<input  class = "form-control" type = "password" name = "pass_me" value = "" placeholder = "Enter Password" required>
					</div>
			</div>

			<div class = "form-group">
				<div class = "col-md-offset-2 col-md-10 check-box">
					<label><input type = "checkbox" name = "remember"> Remember Me</label>
				</div>
			</div>

			<div class = "form-group">
				<div class = "col-md-offset-2 col-md-6">
					<input class = "btn btn-lg btn-primary" type = "submit" value = "Login">
					<span style = "float:right;">Need an account ? <a href = "signup.php" >Sign Up</a></span>
				</div>
			</div>

		</form>
	</div>

</body>

</html>

<?php
	
	}
?>














<!--// Check if logged-in.
if(!isset($_SESSION[$user]))
{

    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header('Location: login.php');
}-->