<?php
	ob_start();
	$hostname = "localhost";
	$username_db = "root";
	$password = "";
	$db_name = "exam";

	$db_link = @mysqli_connect($hostname, $username_db, $password);

	if (mysqli_connect_errno()) {
		printf("Connection Denied %s\n", mysqli_connect_error());
		exit();
	}

	if (!$db_link || !@mysqli_select_db($db_link, $db_name)) {
		die ("Connect Denied\n");
	}



?>