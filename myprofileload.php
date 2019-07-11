<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");

if (mysqli_connect_errno($link))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$ID = $_POST['myemail'];

$result = mysqli_query($link,"SELECT name FROM member where email='$ID'");

$row = mysqli_fetch_array($result);
$data = $row[0];

if($data){
echo $data;
}
mysqli_close($con);
?>
