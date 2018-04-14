<?php
session_start();
include'mysql_connect.php';

//update
$cr_table="mensshirt";
$cr_id="shirt6";
if(isset($_GET["tb"]))
{
	$cr_table=$_GET["tb"];
	$cr_id=$_GET["id"];

}
$sql="SELECT * FROM ".$cr_table." where id='".$cr_id."' ";
$result=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($result))
{
    //$img_one=$row["image1"];
    $img_one="media/".$cr_table."/".$row["image1"];
    if($row["image1"]=="")
    	$img_one="media/profile.jpg";
    $img_two="media/".$cr_table."/".$row["image2"];
    if($row["image2"]=="")
    	$img_two="media/profile.jpg";
    $img_three="media/".$cr_table."/".$row["image3"];
    if($row["image3"]=="")
    	$img_three="media/profile.jpg";
    $img_four="media/".$cr_table."/".$row["image4"];
    if($row["image4"]=="")
    	$img_four="media/profile.jpg";
    $cr_name=$row["name"];
    $cr_price=$row["price"];
    $cr_des=$row["description"];          //echo $row['price'];
}



?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" contant="width=device-width initial-scale=1">
	<!--BootStrap Library-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
       html,body{
    	padding: 0px;
    	margin: 0px;
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
			
			
		}
		.list-group-item-action:hover{
			color: green;
		}


 
    	.small_image{
    		
    		display: block;
    		
    	}
    	.small_image img{
    		border: 1px solid black;
    		width: 50px;
    		height:50px;
    		display: block;
    		position: center;
    		margin:5px;
    	}
    	.large_image img{
    		border: 1px solid black;
    		height: 450px;
    		width: 450px;
    	}
    	.des-group{
    		margin-top: 35%;
    	}
    	.delevary_info{
    		margin-top: 50%; 
    	}
    	.body {
    		margin-top: 30px;
    		
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


	<div class="container-fulid body">
		<div class="container">
			<div class="row">
				<div class="col-md-1 small_image justify-item-center align-item-center">
					<img onclick="document.getElementById('main_image').src='<?php echo $img_one ?>'" src="<?php echo $img_one ?>">
					<img onclick="document.getElementById('main_image').src='<?php echo $img_two ?>'" src="<?php echo $img_two ?>">
					<img onclick="document.getElementById('main_image').src='<?php echo $img_three ?>'" src="<?php echo $img_three ?>">
					<img onclick="document.getElementById('main_image').src='<?php echo $img_four ?>'" src="<?php echo $img_four ?>">
				</div>
				<div class="col-md-5 large_image">
					<img id='main_image' class='img-thumbnail' src='<?php echo $img_one ?>'>
				</div>
				<div class="col-md-4">
					<div class="des-group">
						<h3><?php echo $cr_name;   ?></h3><hr>
					<div style="font-size: 14px;">
					<ul>
						<?php
							$string = $cr_des; // some IP address
							$iparr = explode(".", $string); 
							   
							for($i=0; $i<sizeof($iparr)-1;$i++){
							  	echo '<li>'.$iparr[$i].'</li>';

							} 
						 ?>
					</ul>
					
					</div>
					</div>
					<div class="row" style="margin-top: 50px;">
						<div class="col-md-6">
							<p><b>Price: </b><?php echo $cr_price; ?><span style="font-size: 20px;"> ৳</span></p>
						</div>
						<div class="col-md-6">
							<a href="#review"><p style="text-align:right;">Write a review</p></a>
						</div>
					</div>
                    
                    <form action="" method="post">
	   				<input  type="number" name="quantity" min="0" placeholder="Quantity">
					<button style="display:inline-block;font-weight: bold" class="btn btn-block btn-warning" name="qr" value="'.$row["id"].'";>Buy Now</button>
        			</form>

					<?php
					if(isset($_POST['qr']))
					{
						$sql = "INSERT INTO cart VALUES ('".$cr_name."', '".$cr_price."','oncart',".$_POST['quantity'].")";
        				$conn->query($sql);
					}
					
					?>
				</div>
				<div class="col-md-2">
					<div class="delevary_info">
						<div class="jumbotron text-center" style="padding: 10px;">
						<i class="fa fa-truck" style="font-size: 50px;padding: 10px"></i>
						<p>2-3 Day Express Delivary</p>
					</div>
					<div class="jumbotron text-center" style="padding: 5px;">
						<i class="fa fa-undo" style="font-size: 50px;padding: 10px"></i>
						<p>2 Day Guranted Return Ploicy</p>
					</div>
					</div>
				</div>
			</div>
			<hr>

			<div class="container" id="review">
				
				<div class="row" >
					<div class="col-md-12">
						<div class="review">
						<div class="text-center">
							<h3>Name</h3>
							<p>Got this for my son who is in college and he loves it. All of his friends wanted to try them on so I guess they are stylish. Lenses are tented darkly enough that is light sensitivity is addressed</p>
						</div>
					
					
						<div class="text-center">
							<h3>Name</h3>
							<p>Got this for my son who is in college and he loves it. All of his friends wanted to try them on so I guess they are stylish. Lenses are tented darkly enough that is light sensitivity is addressed</p>
						</div>
						<div class="text-center">
							<h3>Name</h3>
							<p>Got this for my son who is in college and he loves it. All of his friends wanted to try them on so I guess they are stylish. Lenses are tented darkly enough that is light sensitivity is addressed</p>
						</div>
					</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<form class="form-group">
							<textarea class="form-control" style="height: 200px">
								
							</textarea>
							<button style="margin-top:5px;" type="submit" class="btn btn-block">Submit</button>
						</form>
					</div>
					<div class="col-md-6">
						<p>Ekhane ki thakbe bujtesi na</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="jumbotron">
				
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



 <script type="text/javascript">
    $(document).ready(function(){
		$('.review').slick({
			autoplay:true,
			dots:true,
			infinite:false,


		});
	
    });
  </script>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>