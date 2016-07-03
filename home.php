<?php
	
	ob_start();
	@session_start();

	if(isset($_SESSION['topic'])) {
		header('Location: start_quiz.php');
	}


	if ((isset($_COOKIE['id'])) || isset($_SESSION['id'])) {
		
			require('navbar.php');

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				if(isset($_POST['topic'])) {
					$topic = $_POST['topic'];
					if (!preg_match('/Choose your category/', $topic)) {
						$_SESSION['topic'] = $topic;
						header('Location: start_quiz.php');
					
					}else {
						$topic_err = "Select a category";
					}
				}
			}
?>

	<div class = "container" id = "topic_div">
		<div class = "row">
				<div class = "col-lg-4 col-md-8 col-sm-12 col-xs-12">
					<h3>Choose Your Category</h3><br>
					<form role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
						<div class = "form-group">
							<select class = "form-control" name = "topic" required>
								<option unactive>Choose your category</option>
								<option>HTML</option>
								<option>CSS</option>
								<option>PHP</option>
								<option>JAVASCRIPT</option>
								<option>MATH</option>
							</select>
							<span style = "color:red"><?php if(isset($topic_err)) echo $topic_err; ?></span>
						</div>

						<div class = "form-group">
							<br>
							<input class = "btn btn-success" type = "submit" value = "Start!!">
						</div>
					</form>
				</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

</body>

</html>

<?php
}else {
	header('Location:login.php');
}
?>