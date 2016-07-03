<?php
	require ('db_connect.php');
	require('core.php');

	if (check_login()) {
		
		header("Location:index.php");
	}
?>


<?php
	require ('validate_signup.php');
?>

<!DOCTYPE html>

<html lang = "en">
<head> 

	<title>Profile| Sign Up</title>

	<link rel = "icon" type = "image/gif" src = "yDeepak1889.jpg" sizes = "16x16">
	<meta charset = "utf-8">

	<meta name = "viewport" content = "width=device-width, initial-scale=1" >

	<link rel = "stylesheet" type = "text/css" href = "style_main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<script type="text/javascript" src="js/jquery.js"></script>

</head>

<body>



	<div class = "container" id = "main">
		<form class = "form-horizontal" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
			<div class = "form-group">
				<label class = "control-label col-md-2">First name</label>

				<div class = "col-md-10">
					<span style = "color:red;"><?php if (isset($name_err)) echo $name_err; ?></span>
					<input class = "form-control" name = 'first_name' type = "text" placeholder = "Enter Your First name" value = '<?php if(isset($first_name)) echo $first_name; ?>' required>
				</div>
			</div>

			 <div class = "form-group">
				<label class = "control-label col-md-2">last name</label>

				<div class = "col-md-10">
					<input class = "form-control"  type = "text"  name = 'last_name' placeholder = "Enter Your last name" value = '<?php if(isset($last_name)) echo $last_name; ?>' required>
				</div>
			</div>

			<div class = "form-group">
				<label class = "control-label col-md-2">Username</label>

				<div class = "col-md-10">
					<span style = "color:red;"><?php if (isset($username_err)) echo $username_err; ?></span>
					<input class = "form-control"  type = "text"  name = 'username' placeholder = "Choose Username" value = '<?php if(isset($username)) echo $username; ?>' required>
				</div>
			</div>

			<div class = "form-group">
				<label class = "control-label col-md-2">Password</label>

				<div class = "col-md-10">
					<span style = "color:red;"><?php if (isset($pass_err)) echo $pass_err; ?></span>
					<input class = "form-control"  type = "password" name = 'password' placeholder = "Enter password" value = '<?php if(isset($password)) echo $password; ?>' required>
				</div>
			</div>

			<div class = "form-group">
				<label class = "control-label col-md-2">Confirm password</label>

				<div class = "col-md-10">

					<span style = "color:red;"><?php if (isset($pass_match)) echo $pass_match ?></span>
					<input class = "form-control"  type = "password"  name = 're_pass' placeholder = "Re-enter your password" value = '<?php if(isset($re_pass)) echo $re_pass; ?>' required>

				</div>
			</div>


			<div class = "form-group">
				<div class = "col-md-offset-2 col-md-10">
					<input type = "submit" value = "Sign Up" class = "btn btn-primary btn-lg">

					<span style = "float:right;">Already have an account ? <a href = "login.php" >Login </a></span>
				</div>
			</div>
		</form>
	</div>



</body>

</html>

