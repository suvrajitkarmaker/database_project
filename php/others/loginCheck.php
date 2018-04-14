<?php
	$email="";
	$password="";
	include'mysql_connect.php';

	if(isset($_POST["email"], $_POST["password"])){     
		$email = $_POST["email"]; 
		$password = $_POST["password"]; 
		$sql = "select email,password FROM user where email='$email'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0 ){ 
			while ($row = mysqli_fetch_assoc($result)) {
			if ($row["email"]!=$email||$row["password"]!=$password) {
				echo "<ul><li>Wrong email or passsword</li></ul>";
				}
			else{
				echo "<ul><li>Successfully Logged in.</li></ul>";
				}
			}
		}				        
	}
?>