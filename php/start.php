<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container text-center" id="demo">
		<div class="row">
			<div class="col-md-12">
				<h1 style="padding: 50px;">PROJECT: E-SHOP[DEMO]</h1>
				<marquee behaviou="slide" direction="right">Click the <span style="color: #007AC3">D</span><span style="color: #014069">I</span><span style="color: #60BB46">U</span> logo to procceed</marquee>
			</div>
		</div>
		<div class="row" style="">
			<div class="col-md-12">
				<div>
					<img style="padding-top:50px;" src="media/diu_logo.jpg" id="img">
				</div>
			</div>
	    </div>
	    <div class="row">
	    	<div class="col-md-12 text-center">
	    		<h3 style="letter-spacing: 20px; padding: 10px; ">Contributors</h3>
	    	</div>
	    </div>
	    <div class="row">
				<div class="col-md-12 text-center" style="padding: 30px;">
					<img style="width: 21%" src="media/we/nishi.png">
					<img style="width: 20%"  src="media/we/fahim.png">
					<img style="width: 20%"  src="media/we/suvra.png">
					<img style="width: 20%"  src="media/we/tanjed.png">
				</div>
		  </div>
	</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$("#img").click(function(){
				$("#demo").fadeOut(3000,window.location.href= "shop_front.php");

			});
		});
	</script>
</body>
</html>