<?php
session_start();
 include'mysql_connect.php';
  $email=$_SESSION["email"];


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
    <link href="https://fonts.googleapis.com/css?family=Paprika" rel="stylesheet">
    <style type="text/css">
    	h1{
    		font-family: 'Paprika', cursive;
    	}
    	img{
    		margin-top: 5%;
    		margin-right: auto;
    		margin-left: auto;
    		display: block;
    	}

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

	
	<div class="container">
		<div style="margin: 16%;">
			<h1 class="text-center">Registration Success! </h1>
		<div class="text-center">
			<a href="shop_front.php" style="letter-spacing: 5px;">Click to Procceed</a>
		</div>
		<div>
			<img src="media/gear.gif">
		</div>
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