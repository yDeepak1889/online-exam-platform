<?php
	require('db_connect.php');
	require('core.php');

	if(isset($_SESSION['res_1001'])) {
		echo "<script>var len_num = ".$_SESSION['res_1001'].";</script>";
?>


<script type="text/javascript">

	var w =  window.sessionStorage;

	var topic = w['topic'];

	var i;
	var arr = JSON.parse(w['response']);
	//var len = arr.length;
	//console.log(len);
	var db_ans;
	
		function check() {

			var correct = 0;
			var incorrect = 0;

			var s = function (ques_num, given) {

						if (window.XMLHttpRequest) {
			    			var xhttp = new XMLHttpRequest();
			    		}else {
			    			var xhttp = new ActiveXObject('Microsoft.XMLHTTP');
			    		}
			    		xhttp.onreadystatechange = function () {
			    			if (xhttp.readyState == 4 && xhttp.status == 200) {
			    				ans= xhttp.responseText;
			    				if(ans == given) {
			    					correct +=1;
			    					get_final_score(correct, incorrect);
			    				}else {
			    					incorrect +=1;
			    					get_final_score(correct, incorrect);
			    				}

			    				//console.log (correct);
			    				//console.log(incorrect);
			    			}
			    		}
			 
			    		var para = 'id_db='+ques_num+'&col=ans'+'&topic='+topic;

			    		xhttp.open('POST','fetch.php', true);
			    		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			    		xhttp.send(para);

			    		
			    		
	    			}

	    	return s;
		} 

	var s = check();
	var ctr = 0;

	for (i in arr) {
		ctr += 1;
		s(i,arr[i]);
	}

	function get_final_score(correct, incorrect) {

			var unattempted;
			unattempted = len_num - (correct + incorrect);

			var x = document.getElementById('correct_ans');
			var y = document.getElementById('incorrect_ans');
			var z = document.getElementById('unattempted_ans');

			x.innerHTML = correct;
			y.innerHTML = incorrect;
			z.innerHTML = unattempted;

	}

</script>

<?php

	require('navbar.php');
?>	
	
	<section class = "text-center">
		<div class = "container">
			<div class = "row">
				<div class = "col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-6 col-xs-6">
					<h2 class = "ans">CORRECT ANSWER</h2>
				</div>
				<div class = "col-lg-3 col-md-4 col-sm-6 col-xs-6">
					<h2 id = "correct_ans" class = "ans"></h2>
				</div>
			</div>

			<div class = "row">
				<div class = "col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-6 col-xs-6">
					<h2 class = "ans">INCORRECT ANSWER</h2>
				</div>
				<div class = "col-lg-3 col-md-4 col-sm-6 col-xs-6">
					<h2 id = "incorrect_ans" class = "ans"></h2>
				</div>
			</div>

			<div class = "row">
				<div class = "col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-6 col-xs-6">
					<h2 class = "ans">UNATTEMPTED ANSWER</h2>
				</div>
				<div class = "col-lg-3 col-md-4 col-sm-6 col-xs-6">
					<h2 id = "unattempted_ans" class = "ans"></h2>
				</div>
			</div>
		</div>
	</section>
	
	<script type="text/javascript">
		if(ctr == 0) {
			get_final_score(0,0);
		}
	</script>

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

	</body>

	</html>

<?php
	
	}else {
		header('Location: index.php');
	}

	unset($_SESSION['res_1001']);
?>
