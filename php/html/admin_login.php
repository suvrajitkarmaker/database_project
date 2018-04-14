<?php
	session_start();
?>
<!Doctype html>
<html>
	<head>
		<title>Hello World</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width= device width iniital-scale=1">
		<!--Bootstrap stylesheet start-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<!--Bootstrap stylesheet end-->
		<style type="text/css">
			body{
				background: url("media/background.png");
				 height: 100%; 
			    background-position: center;
			    background-repeat: no-repeat;
			    background-size: cover;
			    opacity: 0.95;
			}
			body, html {
			    height: 100%;
			    margin: 0;
			}

		</style>
	</head>
	<body>
		<div class="container">
				<div>
					<div class="text-center">
						<img src="media/logo.png" alt="logo" style="width: 150px;">
					</div>
				</div>
				
			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" id="body">
					<div class="jumbotron bg-secondary">
					<div>
						<h4 class="text-center text-light">Admin Control Panel</h4>
					</div><br>
						<form action="loginCheck.php" method="POST">
							<div class="form-group">
								
								 <input type="text" class="form-control" id="usr" name="email" placeholder="Admin Identity">
							</div><br>
							<div class="form-group">
							  
							  <input type="password" class="form-control" id="usr" name="password" placeholder="Password">
							</div><br>
							<div class="form-group text-center">
							  <button class="btn btn-light navbar-light text-center font-weight-bold">Login</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</body>
</html>