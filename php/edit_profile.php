<?php
 session_start();

  include'mysql_connect.php';
  $email=$_SESSION["email"];

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];

    // image file directory
    $target = "media/user/".basename($image);

    $sql = "update userpic set image='$image' where email='$email'";
    // execute query
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  $upfirst_name=$uplast_name=$upgender=$upbdate="";
                $error= array();
                $temp_name=$temp_pass=$temp_inv_name=0;
                if ($_SERVER["REQUEST_METHOD"] == "GET"){

                    ///////////////////////////////////////////////////////////////////////////////
                    if(empty($_GET["first_name"])){
                      $error[] = "Name Required!<br>";
                      $temp_name++;
                    }
                    else{
                    $upfirst_name=check($_GET["first_name"]);

                       if (!preg_match("/^[a-zA-Z ]*$/",$upfirst_name)) {
                        $error[] = "Invalid Name!<br>";
                        $temp_inv_name++;
                      }

                    }


                    ///////////////////////////////////////////////////////////////////////////////
                    if(empty($_GET["last_name"])){
                      $error[] = "Name Required!<br>";
                      $temp_name++;
                    }
                    else{
                    $uplast_name=check($_GET["last_name"]);

                       if (!preg_match("/^[a-zA-Z ]*$/",$uplast_name)) {
                        $error[] = "Invalid Name!<br>";
                        $temp_inv_name++;
                      }

                    }
                    
                    /////////////////////////////////////////////////////////////////////////////

                    if(empty($_GET["gender"])){
                      $error[] = "Gender Required!<br>";
                    }
                    else{
                    $upgender=check($_GET["gender"]);

                    }
                    
                    
                    /////////////////////////////////////////////////////////////////////////////

                    if(empty($_GET["bdate"])){
                      $error[] = "Birthdate Required!<br>";
                    }
                    else{
                    $upbdate=check($_GET["bdate"]);
                    }
        

                    ///////////////////////////////////////////////////////////////////////////

                    if(count($error)==0){
                      $temp=$_SESSION["email"];
                      
                      $sql_one = "update userinfo set firstname='$upfirst_name',lastname='$uplast_name',gender='$upgender',bdate='$upbdate' where email='$temp'";

                      if(mysqli_query($conn,$sql_one)){

                      header("location:success.php");
                        
                      }
                      else{
                        
                        die( "<h1>Database Error<br></h1>").mysqli_error($conn);
                      }

                      
                    }
                  
                    

                }



                function check($data){
                    $data=trim($data);
                    $data=stripcslashes($data);
                    $data= htmlspecialchars($data);
                    return $data;
                  }
///////////////////////////////////////////////////////////////////////////////////////////////////////

                  if(isset($_GET["get_address"])){

                  	$line1=$_GET["line1"];
                  	$line2=$_GET["line2"];
                  	$line3=$_GET["line3"];

                  	$sqlupdate= "update address set line1='$line1',line2='$line2',line3='$line3' where email='$email'";
                  	$sqlinsert="insert into address values('$email','$line1','$line2','$line3')";
                  	$sqlcheck="Select * from address where email='$email'";

                  	$result=mysqli_query($conn,$sqlcheck);

                  	if(mysqli_num_rows($result) > 0 ){

                  		if(mysqli_query($conn,$sqlupdate)){
                  		 header("location:success.php");
                  	}
                  	else{
                  		 die( "<h1>Database Error<br></h1>").mysqli_error($conn);
                  	}
                    

                }
                else{

                	if(mysqli_query($conn,$sqlinsert)){
                  		 header("location:success.php");
                  	}
                  	else{
                  		 die( "<h1>Database Error<br></h1>").mysqli_error($conn);
                  	}

                }


                  

                  	
                  	


           }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 					if(isset($_POST["passchange"])){

                  	$oldpass=$_POST["oldpass"];
                  	$pass=$_POST["pass"];
                  	$repass=$_POST["repass"];

                  	$sqlupdate= "update userinfo set password='$pass' where email='$email'";
                  	$sqlcheck="select password from userinfo where email='$email'";

                  	$result=mysqli_query($conn,$sqlcheck);
                  	while ($row = mysqli_fetch_assoc($result)) { 
		                    $checkold= $row["password"];  
		                  }

		                if($checkold!=$oldpass)
                  			$uppass_error=1; 
                  		if($pass!=$repass)
                  			$uppass_error++;

                  		if($uppass_error>=1){
                  		$passchekerror=1;
                  	}

                  	else{

                  		if(mysqli_query($conn,$sqlupdate)){
                  		 header("location:success.php");
	                  	}
	                  	else{
	                  		 die( "<h1>Database Error<br></h1>").mysqli_error($conn);
	                  	}


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
.container{
 height: 800px;
 width: 100%;
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
     <div class="col-md-6">
      <h1 style=" text-align: center; padding: 30px;  font-weight: bold;margin-top:50px ">Customize Your Profile</h1>



      <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Basic Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Profile Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Address</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu3">Update Password</a>
  </li>
</ul>
 
       




<!---------------------------------------------------------------->

 <?php

 			$sql= "SELECT firstname,lastname,email,gender,bdate FROM userinfo where email='$email'";
            $result = mysqli_query($conn,$sql ); 

             if(mysqli_num_rows($result) > 0 ){
                    while ($row = mysqli_fetch_array($result)) { 
                     $firstname= $row["firstname"];
                     $lastname=$row["lastname"];
                     $email=$row["email"];
                     
                  }
                }
            ?>
      
      <div class="tab-content">

        <div id="home" class="tab-pane active container">

         <form style="margin-top: 30px;" method="get" action=""> 
            <div class="form-inline" style="margin: 20px;">
              <label style="margin: 5px;">First Name:</label>
              <?php
              echo '<input class="form-control first_name" size="30" value="'.$firstname.'" type="text" name="first_name">' ;
              ?>
            </div>

            <div class="form-inline" style="margin: 22px;">
              <label style="margin: 5px;">Last Name:</label>
              <?php
              echo '<input class="form-control last_name" size="30" value="'.$lastname.'" type="text" name="last_name">' ;
              ?>
            </div>
         


          <div class="form-group " style="margin: 20px 0 20px 42px;">
            <div class="form-inline">
              <label style="margin: 7px;">Gender:</label>
              <select class="form-control gander"  name="gender">
                <option></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select> 
            </div>
          </div>




          <div class="form-group" style="margin: 20px 0 20px 30px;">
            <div class="form-inline">
              <label style="margin: 7px;">Birthdate:</label>
              <input class="form-control date" type="date" name="bdate">
            </div>
          </div>

          <div class="text-center">
            <button class="btn btn-block btn-warning btn-lg" name="basic">Done!</button>
          </div>
        </form>

        </div>
<!---------------------------------------------------------->
        <div id="menu1" class="tab-pane container">
         <form method="POST" action="" enctype="multipart/form-data">
          <div>
            <?php  
                $result = mysqli_query($conn, "SELECT image FROM userpic where email='$email'"); 
                if(mysqli_num_rows($result) > 0 ){
                    while ($row = mysqli_fetch_array($result)) { 
                    echo "<img class='img-thumbnail' style='height: 300px; width: 300px; margin-right:auto;margin-left: auto;display: block;' src='media/user/".$row['image']."' >";
                  }
                }
               

                
            ?>
             
          </div>


            <input class="form-control" type="hidden" name="size" value="1000000">
            <div style="margin-top: 10px;">
              <input class="form-control" type="file" name="image">
            </div>
            <div>
              <button class="btn" style="margin: 10px 0 0 0;width: 150px;" type="submit" name="upload">POST</button>
            </div>
          </form>
        </div>
<!---------------------------------------------------------->

        <div id="menu2" class="tab-pane container>
          <form style="margin-top: 30px;" method="GET" action=""> 

      

            <div class="form-inline" style="margin: 20px;">
              <label style="margin: 5px;">Line 1:</label>
              <input class="form-control first_name" size="30" type="text" name="line1" placeholder="E.x.House no....">
            </div>

            <div class="form-inline" style="margin: 22px;">
              <label style="margin: 5px;">Line 2:</label>
              <input class="form-control last_name" size="30" type="text" name="line2" placeholder="E.x.Road no....">
            </div>
         


           <div class="form-inline" style="margin: 22px;">
              <label style="margin: 5px;">Line 3:</label>
              <input class="form-control last_name" size="30" type="text" name="line3" placeholder="E.x.City name....">
            </div>

          <div class="text-center">
            <button class="btn btn-block btn-warning btn-lg" name="get_address">Done!</button>
          </div>
        </form>
        </div>

<!---------------------------------------------------------->

        <div id="menu3" class="tab-pane container">
          <form style="margin-top: 30px;" method="post" action=""> 

      

            <div class="form-inline" style="margin: 20px;">
              <label style="margin-left: 40px; margin-right:5px">Old Password:</label>
              <input class="form-control first_name" size="30" type="Password" name="oldpass">
            </div>

            <div class="form-inline" style="margin: 22px;">
              <label style="margin-left: 35px;margin-right:5px ">New Password:</label>
              <input class="form-control last_name" size="30" type="Password" name="pass">
            </div>
         


           <div class="form-inline" style="margin-bottom: 22px;">
              <label style="margin: 5px;">Retype New Password:</label>
              <input class="form-control last_name" size="30" type="Password" name="repass">
            </div>

          <div class="text-center">
            <button class="btn btn-block btn-warning btn-lg" name="passchange">Done!</button>
          </div>


          <div style="color: red;">
          	<?php

          		if(isset($passchekerror)>=1){
          			echo"<ul><li>Errors Found!</li><li>Please Recheck</li></ul>";
          		}

          		 	mysqli_close($conn);   
          	?>
          </div>
        </form>
        </div>

      </div>
       </div>
     </div>
     <div class="col-md-3"></div>

    </div>
        <marquee behavior="scroll" direction="right">Please re-hit the tabs if it is faded out.</marquee>
  </div>



  <!-------------------------------------------Body End-------------------------------------------------->
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