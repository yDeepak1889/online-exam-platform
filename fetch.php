<?php

	if(isset($_POST['id_db']) && isset($_POST['col'])&&isset($_POST['topic'])) {

		require('db_connect.php');

		$topic = $_POST['topic'];
		$col = trim($_POST['col']);
		$id_db = trim($_POST['id_db']);

	    $query = "SELECT `".$col."` FROM `".$topic."` WHERE `id`='".$id_db."'";

	   // echo "<script>console.log('".$query."');</script>";

	    $query_run = mysqli_query($db_link, $query);

	    if($query_run){

	    	$arr = mysqli_fetch_assoc($query_run);
	    	$arr = $arr[$col];
	    	echo htmlentities($arr);

	    }else {
	    	echo "ERROR OCCURED";
	    }
	}
?>