<?php
	session_start();

	include'mysql_connect.php';
						$email="";
			            $password="";
			            if(isset($_POST["email"], $_POST["password"])) 
			   			 {     

						        $email = $_POST["email"]; 
						        $password = $_POST["password"]; 
						        $sql = "select password, firstname,lastname FROM userinfo where email='$email'";
						        $result = mysqli_query($conn,$sql);

						        if(mysqli_num_rows($result) > 0 )
						        { 
						           while ($row = mysqli_fetch_assoc($result)) {
						           		if ($row["password"]==$password) {
						           			//echo "<ul><li>Login Success!</li></ul>";
						           			$_SESSION["login"] = true;

						           			$_SESSION["email"] = $email;
						           			$_SESSION["username"]=$row["firstname"]." ".$row["lastname"];

						           			header("location:".$_SESSION["redirect"]);

						           		}
						           		else{
						           			$_SESSION["email"] = 0;
						           			$e=1;
						           		}
						           }
						        }
						        else{
						        	$_SESSION["email"] = 0;
						        	$e=2;
						        	
						        }
						        
						}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style type="text/css">

    	.navbar-brand{
			float: right;	
		}
		#search{
			/*width: 700px;*/
		}
		#nav-icon{
			font-size: 25px;
		}
		.navbar{
			opacity: 0.92;
		}
		#footer{
		/*opacity: 0.7;*/

		}
		#footer a{
			color: white;
		}
		#footer p{
			padding-top: 10px;
			color: orange;
		}
		#footer{
			padding-bottom: 20px;
			padding-top: 10px;
			opacity: 0.92;

		}

		#footer button{
			padding: 5px;
			border:2px solid black;
			background-color: white;
			border-radius: 5px;	
		}
		#footer button:hover{
			font-size: 10px;
			color: red;
		}





    	.input{
    		width: 80%;
    		margin:auto;
    		padding: 10px;
    	}
    	.button{
    		width: 20%;
    		margin:auto;
    		padding: 10px;
    		background: none;
    		outline: none;
    		color: #FFFFFF;
    		font-weight: bold;
    		border: 2px solid white;

    	}
    	.button:hover{
    		box-shadow: 2px 2px 2px #888888;

    	}
    	.body{
    		background: linear-gradient(#71E4BA,#72DBEE);
    		border-top-right-radius:  10px;
    		border-top-left-radius: 10px;
    		padding: 10px;
    		border-right: 1px solid gray;
    		border-left: 1px solid gray;
    		border-top: 1px solid gray;
    	}
    	.logo{
    		height:100px;
    		width: 100px;
    		margin:auto;
    	}
    	.facebook{
    		background-color: #5384C5;
    		color: white;
    		padding: 10px;
    		width: 60%;
    		margin: auto;
    		border:none;
    		outline: none;
    	}
    	.twitter{
    		background-color: #48B1F3;
    		color: white;
    		padding: 10px;
    		width: 60%;
    		margin: auto;
    		border:none;
    		outline: none;
    	}
    	.lowerbody{
    		padding: 50px;
    		background-color: white;
    		border-right: 1px solid gray;
    		border-left: 1px solid gray;
    		border-bottom: 1px solid gray;
    		border-bottom-right-radius:  10px;
    		border-bottom-left-radius: 10px;

    	}
    	.twitter:hover{
    		box-shadow: 2px 2px 2px #888888;
    	}
    	.facebook:hover{
    		box-shadow: 2px 2px 2px #888888;
    	}
    	.container{
    		margin-top: 5%;
    		height: 700px;
    	}
    	.modal_btn{
			background: transparent;
			outline: none;
			border: none;
		}
		 table{
    	 

    }
    
    	table  .t_content td{
    		padding: 30px;
    		text-align: center;
    		
    	}
    	table  .t_head th{
    		padding: 20px;
    		text-align: center;
    		border: 1px solid green;
    		
    	}
    	.footer td{
    		padding: 10px;
    		text-align: center;
    	}
    </style>
</head>
<body>
<?php include'navbar.php'; ?>


<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 text-center body">
			<div>
				<img class="logo" src="media/logo.png">
			</div>
			<div>
				<h3 style="color:#F2F2F2">LOGIN</h3>
			</div>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
				<div class="form-group">
					<input class="form-control input" type="text" name="email" placeholder="Email Address">
				</div>
				<div class="form-group">
					<input class="form-control input" type="password" name="password" placeholder="Password">
				</div>
				<div style="text-align: left; margin-left: 7%; color: red;">
					<?php

				

					if(isset($e)==1){
						echo "<ul><li>Wrong Email or Password</li></ul>";
					}
					else if(isset($e)==2){
						echo "<ul><li>No User Found</li></ul>";
					}
										
					?>
					
				</div>

				<div class="form-group">
					<button class="form-control button">Go!</button>
				</div>
			</form>
		</div>
		</div>
		<div class="col-md-3"></div>
	
<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 text-center lowerbody">
				<form>
					<div class="form-group">
						<button class="form-control facebook">Login With Facebook</button>
					</div>
					<div class="form-group">
						<button class="form-control twitter">Login With Twitter</button>
					</div>
				</form>
				<div>
					<span><a href="user_regi.php" style="color: #272822">Create an account</a></span>
				</div>
				<div style="color: #272822;">
					<span class="small"><a href="contactus.html" style="padding:2px 2px 2px 2px;">About</a></span><span>|</span><span class="small"><a href="contactus.php" style="padding:2px 2px 2px 2px;">Contact Us</a></span>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
</div>




	<!--------footer------>
<div class="container-fluid">
	<div class="row bg-dark text-light">
		<div class="col-md-12">
			<p class="text-center" style="padding-top: 10px;">&copy Copyright 2018.All Rights Reserved.</p>
			<p class="text-center" style="padding-bottom: 10px;">Developed by Team PI</p>
		</div>
	</div>
</div>
 
</body>
</html>