<?php
session_start();
$email=$_SESSION['email'];
include'mysql_connect.php';
$sqlcheck="Select * from address a join userinfo u on a.email = u.email  where u.email='$email'";
$result=mysqli_query($conn,$sqlcheck);
while ($row = mysqli_fetch_assoc($result)) { 
		      $line1=$row['line1'];
		      $line2=$row['line2'];
		      $line3=$row['line3'];
		}


if(isset($_POST['pay'])){
	echo "string";
	$ad_line1=$_POST['ad_line1'];
	$ad_line2=$_POST['ad_line2'];
	$ad_line3=$_POST['ad_line3'];
	$p_type=$_POST['p_type'];
	$p_number=$_POST['p_number'];
	$sql="insert into shipping values('$ad_line1','$ad_line2','$ad_line3','$p_type','$p_number')";
	if(mysqli_query($conn,$sql)){
		$sql="delete from cart";
		mysqli_query($conn,$sql);
		header("Location:end.php");
	}
	else{
		die("Hele");
	}



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

    <style>
    .body{
    	height: 850px;
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

    table{
    	margin-top:50px; 

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
    		
    </style>
</head>
<body>


<<?php include'navbar.php'; ?>
	<div class="container-fluid body"  style="margin-top: 50px">  
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<ul class="nav nav-tabs d-flex justify-content-center">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#address">Confirm Address</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#order">Re-check Order</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#payment">Payment Type</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active container" id="address">
			  	<h2 class="text-center" style="padding: 30px;">Re-Check Your Shipping Address </h2><hr>
			  	<form method="POST" action="">
			  		<div class="form-group">
			  			<input type="text" name="ad_line1" class="form-control" id="line1"  value=<?php echo $line1 ?>>
			  		</div>
			  		<div class="form-group">
					    <input type="text" name="ad_line2" class="form-control" id="line2"  value=<?php echo $line2 ?>>
			  		</div>
			  		<div class="form-group">
					    <input type="text" name="ad_line3" class="form-control" id="line3"  value=<?php echo $line3 ?>>
			  		</div>
			 <!-- 	</form>-->
			  </div>
<!--Order Recheck -------------------------------------------------------------------------------->

			  <div class="tab-pane container" id="order">
			  	<div class="d-flex d-flex justify-content-center align-items-center" style="margin: 1px solid black">
			  		<?php
					 $oncart="oncart";
					 $sql = "select * from cart where status='$oncart'";
					 $result = mysqli_query($conn,$sql);
					 $number = mysqli_num_rows($result);
					?>
					  <table class="table table-bordered table-sm" style="margin-bottom: 50px;">
              
                <tr class="t_head">
                  <th>Status</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Unit</th>
                  <th>Total Price</th>
                </tr>

                <?php
                $total_price=0;

                while ($row = mysqli_fetch_array($result)) {
                $productname = $row['productname'];
                $price = $row['price'];
                $quantity=$row['quantity'];

            ?>
                
                <tr class="t_content">
                  <td><button>Remove</button></td>
                  <td><?php echo $productname  ?></td>
                  <td><?php echo $price ?><span style="font-size: 20px;"> ৳</span></td>
                  <td><?php echo  $quantity ?></td>

                  <td><?php echo $price = $price*$quantity ?><span style="font-size: 20px;"> ৳</span></td>
                </tr>
                <?php $total_price +=$price   ?>

              <?php
              }
              ?>

                <tr class="footer">
                  <td colspan="4"> Amount have to pay(Ex. Without Delivary charge):</td>
                  <td><?php echo $total_price  ?><span style="font-size: 20px;"> ৳</span></td>
                </tr>
             
            </table>

				</div>
			  </div>
			  <!--Payment -------------------------------------------------------------------------------->
			  <div class="tab-pane container" id="payment">
			  <div style="margin: 20px;">
			  		

					<!-- Tab panes -->
					<div class="tab-content">
						<!--<form action="" method="POST">-->
							<select name="p_type" class="form-control">
							<option value="bcash">Bcash</option>
							<option value="dbbl">Rocket</option>
						</select>
						<input style="margin-top: 20px" class="form-control" type="text" name="p_number" placeholder="Bcash/DBBL number">	
						<button name="pay" class="btn btn-warning" style="float:right;margin-top: 20px">Submit</button>
						</form>
						

					  
					</div>
					


			  </div>

				</div>
				<marquee behavior="scroll" direction="right">Choose none in the payment type section for Cash On Delivary.</marquee>
			</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>



<script>
	  $(document).ready(function() {
    var bodyheight = $(document).height()-280;
    $(".body").height(bodyheight);
});
</script>




  <!--------footer------>
<div class="container-fluid" >
  <div class="row bg-dark text-light">
    <div class="col-md-12">
      <p class="text-center" style="padding-top: 10px;">&copy Copyright 2018.All Rights Reserved.</p>
      <p class="text-center" style="padding-bottom: 10px;">Developed by Team PI</p>
    </div>
  </div>
</div>


</body>
</html>