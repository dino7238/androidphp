<?php
$con=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$email = $_GET['email'];
//$NAME = $_GET['NAME'];
$result = mysqli_query($con,"SELECT FROM member where email='$email'");

$row = mysqli_fetch_array($result);
$data = $row[0];

if($data){
echo $data;
}
mysqli_close($con);
?>
