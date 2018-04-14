<?php
 session_start();
 $_SESSION["redirect"]=$_SERVER['REQUEST_URI'];
 include'mysql_connect.php';
 $flag=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-commarce[Demo]</title>
	<meta charset="utf-8">
	<meta name="viewport" contant="width=device-width initial-scale=1">
	<!--BootStrap Library-->
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


    	#myBtn {
		    display: none; /* Hidden by default */
		    position: fixed; /* Fixed/sticky position */
		    bottom: 30px; /* Place the button at the bottom of the page */
		    right: 30px; /* Place the button 30px from the right */
		    z-index: 99; /* Make sure it does not overlap */
		    border: none; /* Remove borders */
		    outline: none; /* Remove outline */
		    background-color: red; /* Set a background color */
		    color: white; /* Text color */
		    cursor: pointer; /* Add a mouse pointer on hover */
		    font-size: 30px; /* Increase font size */
		    opacity: 0.5;
		    padding-right: 10px;
		    padding-left: 10px;
		    border-radius: 50%;
		
		}
	

		#myBtn:hover {
		    background-color: #555; /* Add a dark-grey background on hover */
		}

		.card-img-top{
    		width: 400px;
    		height: 420px;
    	}
    	.pagination{
    		padding-left: 45%;
    	}
    	.page-item{
    		
    	}
    	.imgsize{
    		height: 400px;
    		weight: 380px;
    	}
    	.dropdown{
    		width: 400px;
    	}
    </style>
</head>
<body>
	<button id="myBtn" title="Go to top"><i class="fa fa-chevron-circle-up"></i></i></button>

	<div class="container-fluid">
		 <marquee behavior="scroll" direction="right">Welcome to the noobiest project!</marquee>
	</div>
	
	<nav class="navbar navbar-expand bg-success navbar-dark sticky-top">
		<div class="container-fluid">
			<div class="col-md-3">
				<a class="navbar-brand" href="shop_front.php" id="logo-head"><img class="image" src="media/logo.png" alt="logo" style="width:60px;"></a>
			</div>
			<div class="col-md-5">
				<form class="form-inline" action="/action_page.php">
					<div class="input-group">
						<input class="form-control" type="text" placeholder="Search" id="search" size="100">
				        <div class="input-group-btn">
					      <button class="btn btn-light" type="submit">
					        <i class="fa fa-search" aria-hidden="true"></i>
					      </button>
						</div>
					</div>
			   </form>
			</div>
			<div class="col-md-4">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-question-circle" aria-hidden="true" id="nav-icon"></i> Help</a></li>


					<li class="nav-item">
						<div class="dropdown">
							<a href="" class="nav-link" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true" id="nav-icon"></i>  <?php if(isset($_SESSION["login"]) && $_SESSION["login"]==true)  echo $_SESSION["username"];else echo "Login";?>  <i class="fa fa-level-down"></i></a>


							<div class="dropdown-menu" style="border:1px solid black ;z-index: 1;">
							<?php

							  if(isset($_SESSION["login"]) && $_SESSION["login"]==true){
							  	 $email=$_SESSION["email"];

							  	$result = mysqli_query($conn, "SELECT image FROM userpic where email='$email'"); 
				                if(mysqli_num_rows($result) > 0 ){
				                    while ($row = mysqli_fetch_array($result)) { 
				                    echo '<div class="thumbnail"><img class="img-thumbnail" src="media/'.$row['image'].'" style="width: 60px;height: 60px; display: block;margin-left: auto;margin-right: auto;"><hr><div class="text-center"><a href="logout.php">Logout</a></div><div class="text-center"><a class="text-center" href="edit_profile.php" >Edit Profile</a></div>';
				                    

				                  }
				                }

							  	
							  }
							  else{
							  	
							  	echo '<div class="thumbnail"><img class="img-thumbnail" src="media/profile.jpg" style="width: 60px;height: 60px; display: block;margin-left: auto;margin-right: auto;"><hr><div class="text-center"><a href="customer_login.php">Login</a></div><div class="text-center"><a class="text-center" href="user_regi.php" >Signup</a></div>';
							  }
							?>
						</div>
						</div>
					</li>


					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-shopping-cart" id="nav-icon" aria-hidden="true"></i> Cart  <span class="badge badge-light">4</span></a></li>
				</ul>
			</div>
		</div>	
	</nav>
	<!--------------------------------------------Navbar end-------------------------------------------------->
	<?php

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET["page"]))
{
    $page=$_GET["page"];
	$startpage=($page-1)*12;
}
else
{
	$startpage=0;
}

if(isset($_POST['submit'])){
$selected_val = $_POST['value']; 
	$startpage=0;
}
else
{
	if(isset($_GET["value"]))
	$selected_val=$_GET["value"];
    else
    	$selected_val=1;
	//echo "You have selected :" .$selected_val;
}



		
$sum=$startpage;
?>
	<div class="container-fluid">
	<div class="row">
		<div style="border-right: 3px solid brown;" class="col-3">
		<form action="" method="post">
			<ul class="nav flex-column form-group">
			    <li class="nav-item">
			      <p for="sel1" class="text-center">Filter</p>
			    </li>
			    <li class="nav-item">
			     <select name="value"  class="form-control" id="sel1">
			     <?php
                      if($selected_val==1)
                      	$xx='<option value=1 selected>Random</option>';
                      else
                      $xx='<option value=1 >Random</option>';
                      if($selected_val==2)
                      	$xx.='<option value=2 selected>Price(low-high)</option>';
                      else
                      $xx.='<option value=2 >Price(low-high)</option>';
                      if($selected_val==3)
                      	$xx.='<option value=3 selected>Price(high-low)</option>';
                      else
                      $xx.='<option value=3 >Price(high-low)</option>';
                     echo $xx;


			     ?>
			      </select>
			      <input type="submit" name="submit" value="Select" />
			    </li>
			    <li class="nav-item">Choose Your's Now!</li>
			  </ul>
		</form>
		</div>

<div class="col-9">
     
<?php

if (isset($_GET["table"])) {
  	$qr=$_GET["table"];
}
else
   $qr="mensshirt";

for ($i=0; $i < 3; $i++) { 
	# code...
$XX='<div class="row">
    <div class="container-fluid">
    	<div class="row">';

    if($selected_val==1)       
    $sql="SELECT * FROM ".$qr." limit $sum,4";
else if($selected_val==2)
	$sql="SELECT * FROM ".$qr." order by price limit $sum,4";
else
	$sql="SELECT * FROM ".$qr." order by price desc limit $sum,4";
    $result=mysqli_query($conn,$sql);
                 $sum=$sum+4;
    while ($row = mysqli_fetch_array($result)) { 
    	$XX .= '
        <div class="col-3">
	<div>
		<img class="img-thumbnail imgsize" src="media/'.$qr.'/'.$row["image"].'">
	</div>
	<div>
		<h3>'.$row["name"].'</h3>
	</div>
	<div>
		<p style="font-weight:bold">'.$row["price"].'<span> Taka</span></p>
	</div>
	<div>
	   <form action="" method="post">
		<button style="font-weight:bold;" class="btn form-control btn-primary" name="qr" value="'.$row["id"].'";>Add to Cart</button>
            </form>
	</div>
</div>


    	';
    }

   

    	$XX.='</div>

    </div>

</div>';
echo $XX;

}


?>

<?php
if (isset($_POST['qr'])) {
	$dd=$_POST['qr'];
	 $sql="SELECT * FROM ".$qr." where id='".$dd."' ";
	 //echo $sql;
	 $result=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result))
    {
        $sql = "INSERT INTO suvra VALUES ('".$row["name"]."', '".$row["price"]."')";
        $conn->query($sql);

          //echo $row['price'];
    }
}
 // call the function
?>









		
	</div>
</div>
</div>

<?php
$result1 = mysqli_query($conn, "SELECT * FROM ".$qr."");
$ct= mysqli_num_rows($result1);
$nmpg=$ct/12;
$nmpg=ceil($nmpg);

?>
<div class="container">
  <br>
  <ul class="pagination">
    <?php
    for($a=1;$a<=$nmpg;$a++)
    {
    	echo '<li class="page-item"><a class="page-link" href="prac.php?table='.$qr.'&page='.$a.'&value='.$selected_val.'">'.$a.'</a></li>';
    } ?>
  </ul>
</div> 
</div>

























	<!-------------------------------------------Body End-------------------------------------------------->
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