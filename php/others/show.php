<?php
include'mysql_connect.php';
$result = mysqli_query($conn, "SELECT * FROM user_pic");
while ($row = mysqli_fetch_array($result)) {

      	echo "<img src='images/".$row['image']."' >";
      }

      echo "<img src='media/profile.jpg'>";
      	
      

?>