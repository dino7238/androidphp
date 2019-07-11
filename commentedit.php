<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
if (mysqli_connect_errno($link))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($link,"utf8");

$idx=$_POST['idx'];
$contents=$_POST['contents'];

//$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");

//$result = mysqli_query($link,"SELECT name FROM member where email='$ID'");
$change = mysqli_query($link,"UPDATE comment SET comment = '$contents' WHERE commentidx='$idx'");
$row = mysqli_fetch_array($change);

mysqli_close($link);
?>
