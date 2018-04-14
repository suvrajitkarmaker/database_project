<?php
 session_start();
 $_SESSION["redirect"]=$_SERVER['REQUEST_URI'];
 include'mysql_connect.php';
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

		#footer{
		/*opacity: 0.7;*/

		}
		.carousel-inner img {
		      width: 100%;
		      height: 100%;
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
    	#list_menu  a{
    		font-size: 12px;
    		padding: 11.7px;
 			border:0px;
    	}
    	#slider_front{
    		border: 1px solid #95A5A6;
    	}

    	#list_menu a i{
    		font-size: 15px;
    		padding: 3px;
    	}
    	#slider-right li{
    		font-size: 12px;
 			padding: 2px;
 			margin: 0px;
 			border: 0px;
    	}
    	.card{
    		margin-right: 5px;
    		margin-left: 5px;
    	}
    	#first_row{
    		margin-top:30px; 
    		
    	}
    	.prev,.next{
    		background-color: transparent;
    		border: none;
    	}
    	.prev i{
    		font-size: 20px;
    		font-weight: bold;
    		padding: 10px;
    		border: 1px solid #95A5A6;
    	}
    	.prev i:hover{
    		border-radius: 30px;	
    		background-color:#95A5A6; 
    	}
    	.next i{
    		font-size: 20px;
    		font-weight: bold;
    		padding: 10px;
    		border: 1px solid #95A5A6;
    			
    	}
    	.next i:hover{
    		border-radius: 30px;
    		background-color:#95A5A6; 
    	}
    	.catagory_icon{
    		font-size: 50px;
    	}
    	.cat_image:hover{
    		border: 5px solid white;
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
	<button id="myBtn" title="Go to top"><i class="fa fa-chevron-circle-up"></i></i></button>

	<div class="container-fluid">
		 <marquee behavior="scroll" direction="right">Welcome to the noobiest project!</marquee>
	</div>
<?php include'navbar.php'; ?>

	<div class="container bg-light" id="slider_front">
		<div class="row">
			<div class="col-md-2">
				<ul class="list-group " id="list_menu">
					<a href="#men" class="list-group-item-action"><i class="fa fa-male"></i> MEN'S FASION</a></li>
					<a href="#women" class="list-group-item-action"><i class="fa fa-female"></i>WOMEN'S FASION</a></li>
					<a href="#computer" class="list-group-item-action"><i class="fa fa-tv"></i>COMPUTING</a></li>
					<a href="#homeandliving" class="list-group-item-action"><i class="fa fa-home"></i>HOME & LIVING</a></li>
					<a href="#tv" class="list-group-item-action"><i class="fa fa-camera"></i></i>TV & CAMERA</a></li>
					<a href="#phone" class="list-group-item-action"><i class="fa fa-mobile"></i>PHONES & TABS</a></li>
					<a href="#beauty" class="list-group-item-action"><i class="fa fa-heartbeat"></i>BEAUTY & HEALTH</a></li>
					<a href="#other" class="list-group-item-action"><i class="fa fa-flask"></i>OTHERS</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
  	<div class="carousel-item active">
      <img src="media/banner_fasion.jpeg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="media/banner_pc.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="media/banner_fit.jpg" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="media/banner_phone.jpg" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
 <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>-->
</div>
			</div>
			<div class="col-md-2">
				<div class="container-fluid">
					<div class="row">
					<div class="col-md-12">
							<i class="fa fa-truck" style="font-size: 100px; text-align:center;width: 100%;"></i>
						</div>
						<div class="col-md-12">
							<p class="small text-center">CASH ON DELIVERY</p>
						</div>
						<div class="col-md-12">
							<i class="fa fa-unlock" style="font-size: 100px; text-align:center;width: 100%;"></i>
						</div>
						<div class="col-md-12">
							<p class="small text-center">100% PURCHESE PROTECHTION</p>
						</div>
						<div class="col-md-12">
							<p class="small text-center" style="font-weight: bold; letter-spacing: 2px;padding-top: 10px;">AIM FOR THE BEST</p>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>

	<!-- head Slider End-->

	<div class="container">
		<div class="row"  id="first_row">
			<div class="col-md-2" style="padding: 0px; margin-top: 3%">
				<img src="media/banner_one.jpg" style="width: 100%">
			</div>
			<div class="col-md-0.5" style="margin-top:10%">
				<button class="prev"><i class="fa fa-angle-left"></i></button>
			</div>
			<div class="col-md-7 bg-light text-center" style="padding: 0px;">
				 <div class="your-class">
				    <div class="card">
				    	<img src="media/card_images/card_img_one.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px;">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_two.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_three.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				   <div class="card">
				    	<img src="media/card_images/card_img_four.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_five.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_six.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_seven.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_eight.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_nine.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				    <div class="card">
				    	<img src="media/card_images/card_img_ten.jpg" class="card-img-top">
				    	<p>Asus Asus E203NAH Laptop</p>
				    	<p class="small" style="line-height: 0px">৳ 30,000</p>
				    </div>
				  </div>
			</div>
			<div class="col-md-0.5" style="margin-top:10%">
				<button class="next"><i class="fa fa-angle-right" class="next"></i></button>
			</div>
			<div class="col-md-2" style="padding: 0px; margin-top: 5%">
				<img src="media/banner_two.jpg" style="width: 100%; " class="float-right">
			</div>
		</div>
		<!--banner slider end-->
		<div class="row" style="margin-top:5%">
			<div class="col-md-12" style="padding: 0px; overflow: hidden;">
				<img src="media/body_banner/one.gif" style="width: 100%;height: 120px;" >
			</div>
		</div>
		<!--Advertise Banner end-->
		<div class="row" id="men" style="border: 1px solid black;margin-top:5%" >
			<div class="col-md-2" >
				<div style="margin-top:70%; text-align: center;">
					<div>
					<h5>MEN'S FASION</h5>
					</div>
					<div>
						<i class="fa fa-user catagory_icon"></i>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<img src="media/main_catagory_banner/men.jpg" style="width: 100%;height: 300px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<a href="allproduct.php?table=mensshirt"> <img class="cat_image" src="media/catagory_logo/man/shirt.jpg" style="height: 150px;"> </a> 
				</div>
				<div>
					<a href="allproduct.php?table=menspant"> <img class="cat_image" src="media/catagory_logo/man/pant.jpg" style="height: 150px;"> </a>
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/man/glass.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/man/panjabi.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/man/t_shirt.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/man/other.jpg" style="height: 150px;">
				</div>
			</div>
		</div>
		<!--First Row end-->

		<div class="row" style="margin-top:5%">
			<div class="col-md-12" style="padding: 0px; overflow: hidden;">
				<img src="media/body_banner/two.gif" style="width: 100%;height: 120px;">
			</div>
		</div>

		<!--Advartise row end-->

		<div class="row" id="second_row" style="background:linear-gradient(to right, white,#4CC2CB,white); border-radius: 5px;margin-top:5%">
			<div class="col-md-12 text-center">
				<img src="media/logo.png" style="width:100px;">
				<p class="text-light" style="letter-spacing: 10px; font-weight: bold;">ALWAYS AT YOUR SERVICE</p>
			</div>
		</div>
		<!--mybanner Row End-->

		<div class="row"  style="margin-top:5%">
			<div class="col-md-12" style="padding: 0px; overflow: hidden;">
				<img src="media/body_banner/three.gif" style="width: 100%;height: 120px;">
			</div>
		</div>
		<!--Advertise Banner end-->
		<div class="row" id="women" style="border: 1px solid black;margin-top:5%" >
			<div class="col-md-2" >
				<div style="margin-top:70%; text-align: center;">
					<div>
					<h5>WOMEN'S FASION</h5>
					</div>
					<div>
						<i class="fa fa-female catagory_icon" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<img src="media/main_catagory_banner/women.jpg" style="width: 100%;height: 300px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/woman/sharee.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/woman/saloar.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/woman/glass.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/woman/jens.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/woman/watch.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/woman/shoe.jpg" style="height: 150px;">
				</div>
			</div>
		</div>
		<!--second Row end-->
		<div class="row"  style="margin-top:5%">
			<div class="col-md-12" style="padding: 0px; overflow: hidden;">
				<img src="media/body_banner/four.gif" style="width: 100%;height: 120px;">
			</div>
		</div>
		<!--Advertise Banner end-->
		<div class="row" id="computer" style="border: 1px solid black;margin-top:5%" >
			<div class="col-md-2" >
				<div style="margin-top:70%; text-align: center;">
					<div>
					<h5>COMPUTING</h5>
					</div>
					<div>
						<i class="fa fa-laptop catagory_icon" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<img src="media/main_catagory_banner/computer.jpg" style="width: 100%;height: 300px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/computing/laptop.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/computing/desktop.png" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/computing/print.png" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/computing/game.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/computing/router.png" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/computing/other.jpg" style="height: 150px;">
				</div>
			</div>
		</div>
		<!--Third Row end-->
		
		<div class="row" id="homeandliving" style="border: 1px solid black;margin-top:5%" >
			<div class="col-md-2" >
				<div style="margin-top:70%; text-align: center;">
					<div>
					<h5>HOME AND LIVING</h5>
					</div>
					<div>
						<i class="fa fa-home catagory_icon" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<img src="media/main_catagory_banner/home.jpg" style="width: 100%;height: 300px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/home/bedding.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/home/furniture.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/home/kitchen.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/home/light.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/home/show.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/home/other.jpg" style="height: 150px;">
				</div>
			</div>
		</div>
		<!--Forth Row end-->
		<div class="row" style="margin-top:5%">
			<div class="col-md-12" style="padding: 0px; overflow: hidden;">
				<img src="media/body_banner/five.gif" style="width: 100%;height: 120px;">
			</div>
		</div>
		<!--Advertise Banner end-->
		<div class="row" id="tv" style="border: 1px solid black;margin-top:5%" >
			<div class="col-md-2" >
				<div style="margin-top:70%; text-align: center;">
					<div>
					<h5>TV & CAMERA</h5>
					</div>
					<div>
						<i class="fa fa-television catagory_icon" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<img src="media/main_catagory_banner/tv.jpg" style="width: 100%;height: 300px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/tv/canon.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/tv/nikon.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/tv/lg.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/tv/samsung.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/tv/sony.png" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/tv/tosiba.jpg" style="height: 150px;">
				</div>
			</div>
		</div>
		<!--Fifth Row end-->
		<div class="row" id="phone" style="border: 1px solid black;margin-top:5%;overflow: hidden;" >
			<div class="col-md-2" >
				<div style="margin-top:70%; text-align: center;">
					<div>
					<h5>PHONES & TABLATES</h5>
					</div>
					<div>
						<i class="fa fa-mobile catagory_icon" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<img src="media/main_catagory_banner/phone.jpg" style="width: 100%;height: 300px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/phone/apple.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/phone/samsung.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/phone/sony.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/phone/huawei.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/phone/mi.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/phone/oppo.jpg" style="height: 150px;">
				</div>
			</div>
		</div>
		<!--sixth Row end-->
		<div class="row" style="margin-top:5%">
			<div class="col-md-12" style="padding: 0px; overflow: hidden;">
				<img src="media/body_banner/six.gif" style="width: 100%;height: 120px;">
			</div>
		</div>
		<!--Advertise Banner end-->
		<div class="row" id="beauty" style="border: 1px solid black;margin-top:5%;overflow: hidden;" >
			<div class="col-md-2" >
				<div style="margin-top:70%; text-align: center;">
					<div>
					<h5>BEAUTY & HEALTH</h5>
					</div>
					<div>
						<i class="fa fa-heartbeat catagory_icon" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<img src="media/main_catagory_banner/beauty.jpg" style="width: 100%;height: 300px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/beauty/detol.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/beauty/garnier.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/beauty/head.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/beauty/parasute.jpg" style="height: 150px;">
				</div>
			</div>
			<div class="col-md-2">
				<div>
					<img class="cat_image" src="media/catagory_logo/beauty/veet.jpg" style="height: 150px;">
				</div>
				<div>
					<img class="cat_image" src="media/catagory_logo/beauty/other.jpg" style="height: 150px;">
				</div>
			</div>
		</div>
		<!--seventh Row end-->
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

	<!--SCRIPTS-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
		$('.your-class').slick({
			slideToShow:3,
			slideToScroll:3,
			infinite: true,
			prevArrow:$('.prev'),
			nextArrow:$('.next'),
			variableWidth: true,
		});
	
    });
  </script>

  <script type="text/javascript">
		$(document).ready(function(){
				$("body").hide();	
				$("body").fadeIn(3000);	
		});
	</script>

<script type="text/javascript">

	$(document).ready(function(){
	

		$(window).scroll(function(){
			
		    if ($(window).scrollTop() > 20 || $(document).scrollTop() > 20) {
		       $("#myBtn").css("display","block");
		    } else {
		        $("#myBtn").css("display","none");
		    }
		
		});

	$('#myBtn').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		
	});
	
});

		
	</script>
	<!--<script type="text/javascript">
				$("#myMenu").hide();
				$(document).ready(function(){
					$("#collapseButton").mouseenter(function(){
						$("#myMenu").fadeIn();
					});
					$("#collapseButton").mouseleave(function(){
						$("#myMenu").fadeOut();
					});
				});
			</script>

	<script type="text/javascript">
		$(document).ready(function() {
		   $('#demo').css({
		       width: $(document).width(),
		       height: $(document).height()
		   });
		})
	</script>-->
</body>
</html>