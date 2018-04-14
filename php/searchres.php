<?php
include'mysql_connect.php';
$cr_name="pant";
if(isset($_GET['search'] ))
{
	$cr_name=$_GET['search'];
}
$sql="SELECT * FROM catagory";
$result=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($result))
{
   // echo $row["table_name"]." ";
    $sl="SELECT * FROM ".$row["table_name"]." where name like '%".$cr_name."%' or name like '%".$cr_name."' or name like '".$cr_name."%'";
	$rt=mysqli_query($conn,$sl);
	while ($rw = mysqli_fetch_array($rt))
	{  
		$s="insert into search values('".$rw['id']."','".$rw['name']."','".$rw['image1']."','".$rw['image2']."','".$rw['image3']."','".$rw['image4']."','".$rw['price']."','".$rw['description']."')";
		mysqli_query($conn, $s);

	}
}


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
    		height: 300px;
    		width: 300px;
    	}
    	.dropdown{
    		
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
<body >



	
	
	
	<?php
include'navbar.php';
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
	<div class="container-fluid body">
	<div class="row">
		<div style="border-right: 3px solid brown;" class="col-3 side">
		<form action="" method="post">
			<ul class="nav flex-column form-group">
			    <li class="nav-item">
			      <p for="sel1" class="text-center">Filter</p>
			    </li>
			    <li class="nav-item">
			     <select name="value"  class="form-control" id="sel1" style="margin: 10px;">
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
			      <input class="btn btn-secondary" type="submit" name="submit" value="Select" style="margin-left:auto;margin-right: auto; display: block;padding-right:20px;padding-left:20px;  " />
			    </li>
			    <li class="nav-item text-center">Choose Your's Now!</li>
			  </ul>
		</form>
		</div>

<div class="col-9">
     
<?php

$qr="search";

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
        <div class="col-3" style="margin-top:20px;">
	<div>
		<img class="img-thumbnail imgsize" src="media/'.$qr.'/'.$row["image1"].'">
	</div>
	<div>
		<a style="text-decoration:none;" href="single_product_des.php?tb='.$qr.'&id='.$row["id"].'">	<h3>'.$row["name"].'</h3> </a>
	</div>
	<div>
		<p style="font-weight:bold">'.$row["price"].'<span> ৳</span></p>
	</div>
	<div>
	
	   <form action="" method="post">
	   <input  type="number" name="quantity" min="0" placeholder="Quantity">
		<button style="font-weight:bold;" class="  " name="qr" value="'.$row["id"].'";>Add to Cart</button>
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
	$quantity=$_POST['quantity'];
	$dd=$_POST['qr'];
	 $sql="SELECT * FROM ".$qr." where id='".$dd."' ";
	 //echo $sql;
	 $result=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result))
    {
        $sql = "INSERT INTO cart VALUES ('".$row["name"]."', '".$row["price"]."','oncart',$quantity)";
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

<script>
	  $(document).ready(function() {
    var bodyheight = $(document).height()-230;
    $(".body").height(bodyheight);

});
</script>
</body>
</html>