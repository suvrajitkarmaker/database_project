<?php
$dbname = 'e_shop';

if (!$conn=mysqli_connect('localhost', 'root', '')) {
    echo 'Could not connect to mysql';
    exit;
}

$sql = "SHOW TABLES FROM e_shop";
$result = mysqli_query($conn,$sql);

if (!$result) {
    echo "DB Error, could not list tables"."<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysqli_fetch_row($result)) {
    echo "Table: {$row[0]}"."<br>";
}

?>