  <?php
	require('db_connect.php');
	require('core.php');

	if (((isset($_COOKIE['id'])) || isset($_SESSION['id'])) && isset($_SESSION['topic']))  {


		$topic = strtolower($_SESSION['topic']);

    	echo "<script>var topic = '".$topic."';</script>";

    	$query = "SELECT * FROM `".$topic."` WHERE 1";

    	
      $query_run = mysqli_query($db_link, $query);
    	if($query_run){

    		$len = mysqli_num_rows($query_run);
    		echo "<script>var len =".$len.";</script>";
    	}

		
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>QUIZZY</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!--************************* DECLARE FUNCTION FOR AJAX*************************-->

    <script type="text/javascript">
   //  var str =  '<h4><span id = "ques_num"> </span><span id = "ques">How you doing?<span></h4><br><label><input type = "radio" name = "correct" value = "" > <span id = "op1">option1</span></label><br><label><input type = "radio" name = "correct" value = "" > <span id = "op2">option2</span></label><br><label><input type = "radio" name = "correct" value = "" > <span id = "op3">option1</span></label><br>\<label><input type = "radio" name = "correct" value = "" > <span id = "op4">option1</span></label><br><br><br><button class = "btn btn-default btn-lg" id = "prev" onclick = "prev_ques()">Prev</button><button class = "btn btn-default btn-lg" id = "next" onclick = "next_ques()">Next</button>';
    	function prevent() {
    		return "Want to quit?";
    	}


    	function get_data(id, col) {
    		var change_me = document.getElementById(col);

    		if (window.XMLHttpRequest) {
    			var xhttp = new XMLHttpRequest();
    		}else {
    			var xhttp = new ActiveXObject('Microsoft.XMLHTTP');
    		}

    		xhttp.onreadystatechange = function () {
    			if (xhttp.readyState == 4 && xhttp.status == 200) {

    				change_me.innerHTML = xhttp.responseText;
    				//console.log(xhttp.responseText);
    			}
    		}

    		var para = 'id_db='+id+'&col='+col+'&topic='+topic;

    		xhttp.open('POST','fetch.php', true);
    		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    		xhttp.send(para);

    	}

    </script>

<!--*************************************AJAX COMPLETE*****************************************-->


<!--*************************CONNECT TO DATA BASE AND FETCH QUES STOER IN JS OBJECT ********THINK MORE CONVIENIENT WAY***********-->
	

<!--****************************** Fetching Complete**************************************-->
  </head>





  <body onbeforeunload = "return prevent()">
  		<center >
  			<h1><span id = "time">01:00</span> <button  id = "quit" onclick = "result()">QUIT</button></h1>

  		</center>

  		<div class = "well" id = "content">
        <h4><span id = "ques_num"> </span><span id = "ques">How you doing?<span></h4><br>

        <label><input type = "radio" name = "correct" value = "0" onclick = "get_value(this)"> <span id = "op1">option1</span></label><br>
        <label><input type = "radio" name = "correct" value = "1" onclick = "get_value(this)"> <span id = "op2">option2</span></label><br>
        <label><input type = "radio" name = "correct" value = "2" onclick = "get_value(this)"> <span id = "op3">option1</span></label><br>
        <label><input type = "radio" name = "correct" value = "3" onclick = "get_value(this)"> <span id = "op4">option1</span></label><br><br><br>
        
        <button class = "btn btn-default btn-lg" id = "prev" onclick = "prev_ques()">Prev</button>
        <button class = "btn btn-default btn-lg" id = "next" onclick = "next_ques()">Next</button>
  		</div>  





 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



<!--****************************TIMER START**********************************************-->

  	<script type="text/javascript">

  			var x = document.getElementById('time');
  			var sec = 59,min = 0;
        

  				var y = function timer() {
            
  					var str="";
          
  					if(min<=0) {
  						min = 0;
  					}if(sec <=0) {
  						sec = 0;
  					}

  					if(min<=9) {
  						str += '0'+min+':';
  					}else {
  						str += min+':';
  					}

  					if(sec<=9) {
  						str+= '0'+sec;
  					}else {
  						str += sec;
  					}

  					x.innerHTML = str;
  					sec -= 1;
  					if(sec== 0) {
  						sec = 59;
  						min -=1;
  					}

  					if(min == -1) {
  						var c = function last_sec(){
  							x.innerHTML = '00:00';
  						}


  						setTimeout(c,1000);
  						clearInterval(set);

              result();
  					}
  				
  			}

        var set = setInterval(y,1000);

  	</script>

  <!--********************************************TIMER SET**************************************-->

    <script type="text/javascript">
    
    var current = 1;
    var ctr = 0;
    function disable_prev(a) {
        if(a == 1) {
            document.getElementById('prev').disabled = true;

        }else{
            document.getElementById('prev').disabled = false;
        }
    }

    disable_prev(current);
    

    function disable_next(a) {

        if(document.getElementById('next')) {
            var last = document.getElementById('next');
        }
        
        if(document.getElementById('finish')) {
            var last2 = document.getElementById('finish');
        }
        
        if(a == len) {
            last.id = "finish";
            last.innerHTML = "FINISH";
            ctr+=1;
        }else if(ctr==1){
            last2.id = 'next';
            last2.innerHTML = "NEXT";
            ctr = 0;
        }
    }
    disable_next(current);

    function update_num(a) {

        document.getElementById('ques_num').innerHTML = a +'-: ';
        
    }

    update_num(current);

    get_data(current, 'ques');
    get_data(current, 'op1');
    get_data(current, 'op2');
    get_data(current, 'op3');
    get_data(current, 'op4');

    function next_ques() {

        if(current<len){

            current+=1;
            get_data(current, 'ques');
            get_data(current, 'op1');
            get_data(current, 'op2');
            get_data(current, 'op3');
            get_data(current, 'op4');
            update_num(current);
            disable_next(current);
            disable_prev(current);
    //  check_ans(0,1);

        }else {
          result();
        }
        //console.log(current);
        check_required();
    }

    function prev_ques() {

        if(current>1){

            current-=1;
            get_data(current, 'ques');
            get_data(current, 'op1');
            get_data(current, 'op2');
            get_data(current, 'op3');
            get_data(current, 'op4');
            update_num(current);
            disable_next(current);
            disable_prev(current);

        }
        check_required();
        //console.log(current);
    }

    var arr = {};
    function get_value (radio_select) {

      arr[current] = radio_select.value;
      console.log(arr);
    }

    
     function all_false() {
          var q = document.getElementsByName('correct');
          var i;
          for (i = 0; i < q.length; i++) {

            q[i].checked = false;
          }

      }

      function check_required(){
        var s = document.getElementsByName('correct');
        if(arr[current] && arr[current] != -1) {
            s[arr[current]].checked = true;
        }else {
          all_false();
        }
      }

      function result() {
        var w = window.sessionStorage;
        w.setItem('response',JSON.stringify(arr));
        console.log(w['response']);
        w['topic'] = topic;
        var a = "<?php echo($_SESSION['res_1001'] =$len);?>";
        window.onbeforeunload = null;
        window.location = 'result.php';
      }

    </script>
  </body>


<?php
	}else {
		header('Location:index.php');
	}

	unset($_SESSION['topic']);
?>

