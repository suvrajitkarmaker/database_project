<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
		<input type="text" name="email">
		<input type="password" name="password">
		<input type="submit" name="login" value="submit">

		<?php
			$email="";
			$password="";
			$host= "localhost";
			$user= "root";
			$password= "";
			$dbname= "e_shop";


			$conn= mysqli_connect($host,$user,$password,$dbname);

			if(!$conn){
				die("Error<br>".mysqli_connect_error());
			}
			else{
				echo "connected<br>";
			}

			if(isset($_POST["email"], $_POST["password"])) 
   			 {     

			        $email = $_POST["email"]; 
			        $password = $_POST["password"]; 
			        $sql = "select password FROM user where email='$email'";
			        $result = mysqli_query($conn,$sql);

			        if(mysqli_num_rows($result) > 0 )
			        { 
			           while ($row = mysqli_fetch_assoc($result)) {
			           		if ($row["password"]==$password) {
			           			echo "Success";
			           		}
			           		else{
			           			echo "wrong";
			           		}
			           }
			        }
			        
			}
						


		?>
	</form>
</body>
</html>