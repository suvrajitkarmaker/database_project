<?php
								session_start();
                                include'mysql_connect.php';
								$first_name=$last_name=$email=$pass=$repass=$gender=$bdate="";
								$error= array();
								$temp_name=$temp_pass=$temp_inv_name=0;
								if ($_SERVER["REQUEST_METHOD"] == "POST"){

									///////////////////////////////////////////////////////////////////////////////
									if(empty($_POST["first_name"])){
										$error[] = "Name Required!<br>";
										$temp_name++;
									}
									else{
									$first_name=check($_POST["first_name"]);

										 if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
											$error[] = "Invalid Name!<br>";
											$temp_inv_name++;
										}

									}


									///////////////////////////////////////////////////////////////////////////////
									if(empty($_POST["last_name"])){
										if($temp_name==0)
										$error[] = "Name Required!<br>";
									}
									else{
									$last_name=check($_POST["last_name"]);

										 if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
										 	if($temp_inv_name==0)
											$error[] = "Invalid Name!<br>";
										}

									}



									////////////////////////////////////////////////////////////////////////////////


									if(empty($_POST["pass"])){
										$error[] = "Password Required!<br>";
										$temp_pass++;
									}
									else{
									$pass=check($_POST["pass"]);

									}



									/////////////////////////////////////////////////////////////////////////////

									if(empty($_POST["repass"])){
										if($temp_pass==0)
										$error[] = "Password Required!<br>";
									}
									else{
									$repass=check($_POST["repass"]);

									}

									if(empty($pass)&&empty($repass)){

									}
									else{
										if($pass!==$repass){
											$error[]="Password did not match!<br>";
										}
									}

									//////////////////////////////////////////////////////////////////////////////

									if(empty($_POST["email"])){
										$error[] = "Email Required!<br>";
									}
									else{

									$email=check($_POST["email"]);
										 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
											$error[] = "Invalid Email!<br>";
										}

									}
									
									/////////////////////////////////////////////////////////////////////////////

									if(empty($_POST["gender"])){
										$error[] = "Gender Required!<br>";
									}
									else{
									$gender=check($_POST["gender"]);

									}
									
									
									/////////////////////////////////////////////////////////////////////////////

									if(empty($_POST["bdate"])){
										$error[] = "Birthdate Required!<br>";
									}
									else{
									$bdate=check($_POST["bdate"]);
									}
						

									///////////////////////////////////////////////////////////////////////////
									if(empty($_POST["checkbox"])){
										$error[] = "Read The Conditions!<br>";
									}
									
						

									///////////////////////////////////////////////////////////////////////////

									if(count($error)==0){
										
										$sql_one = "insert into userinfo (firstname,lastname,email,password,gender,bdate) values('$first_name','$last_name','$email','$pass','$gender','$bdate')";
										$sql_two = "insert into userpic (email,image) values('$email','profile.jpg')";
										

										if(mysqli_query($conn,$sql_one) && mysqli_query($conn,$sql_two)){

											header("location:success.php");
										}
										else{
											
											die( "<h1>Database Error<br></h1>").mysqli_error($conn);
										}

										mysqli_close($conn);
									}
									
										

								}



								function check($data){
										$data=trim($data);
										$data=stripcslashes($data);
										$data= htmlspecialchars($data);
										return $data;
									}


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Logo-->
    <link rel="icon" type="image/png" href="media/logo.png">
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


    	.first_name,.last_name,.pass, .repass,.check{
    		margin: 6px;
    	}
    	.gander{
    		margin: 6px;
    		 width: 89.5% !important;

    	}
    	.date{
    		margin: 6px;
    		width: 88% !important;
    	}
    	.email{
    		margin: 6px;
    		width: 91.5% !important;
    	}
    	.create{
    		background: none;
    		outline: none;
    		border: 1px solid black;
    		margin-top: 20px;
    		font-weight: bold;
    		font-size: 20px;
    	}
    	.body{
    		margin-top: 3%;
    		height: 750px;

    	}
    	.create:hover{
    		background:#46BEF0;
    		color: white; 
    	}

    	.section{
    		

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
<<?php include'navbar.php'; ?>

	<div class="container body">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 section">
				<div>
					<h3 class="text-center" style="color: #788088; padding:30px;border-bottom: 1px solid black; padding-bottom:10px; ">CREATE A NEW ACCOUNT</h3>
				</div>
				<form style="margin-top: 30px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
					<div class="form-group form-inline">
						<div class="form-inline">
							<label>First Name:</label>
							<input class="form-control first_name" size="30" type="text" name="first_name">
						</div>
						<div class="form-inline">
							<label>Last Name:</label>
							<input class="form-control last_name" size="30" type="text" name="last_name">
						</div>
					</div>


					<div class="form-group" style="margin-left: 40px;">
						<div class="form-inline">
							<label>Email:</label>
							<input class="form-control email" type="text" name="email">
						</div>
					</div>


					<div class="form-group form-inline" style="margin-left: 11px;">
						<div class="form-inline">
							<label>Password:</label>
							<input class="form-control pass" size="26" type="password" name="pass">
						</div>
						<div class="form-inline">
							<label>Re-type Password:</label>
							<input class="form-control repass" size="27" type="password" name="repass">
						</div>
					</div>



					<div class="form-group " style="margin-left: 25px;">
						<div class="form-inline">
							<label>Gender:</label>
							<select class="form-control gander" name="gender">
								<option></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>	
						</div>
					</div>




					<div class="form-group" style="margin-left: 12px;">
						<div class="form-inline">
							<label>Birthdate:</label>
							<input class="form-control date" type="date" name="bdate">
						</div>
					</div>


					<div class="form-check form-check-inline check" style="margin-left:90px;">
						<label class="form-check-label"><input class="form-check-input" type="checkbox" name="checkbox" value="ture">I have read and accept the Terms & Conditions.</label>
					</div>

					<div class="text-center">
						<button class="form-control create">Create</button>
					</div>
				</form>
				<div style="color: red;line-height: 5px;margin-top: 10px;">
					<?php

						$temp=0;
						while($temp<count($error)){
							echo "<ul><li>".$error[$temp]."</li></ul>";
							$temp++;
						}
					?>
				
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	

<!------------------------------------------------>


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