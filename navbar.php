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
  </head>

<body>
	<div class = "navbar navbar-default">
		<div class = "container">
			<div class = "navbar-header">

				<button type = "button" class = "navbar-toggle" data-toggle="collapse" data-target = ".navbar-collapse">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				<a href = "#" class = "navbar-brand">
					<div class = "logo">
						<p><?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?></p>
					</div>
				</a>
			</div>

			<div class = "navbar-collapse collapse">
				<ul class = "nav navbar-nav navbar-right">
					<li><a href = "index.php">HOME</a></li>
					<li><a href = "#"> QUIZ RESULTS</a></li>
					<li><a href = "logout.php">LOG OUT</a></li>
				</ul>
			</div>
		</div>
	</div>
