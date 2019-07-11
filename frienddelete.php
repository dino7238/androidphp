<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");

if (mysqli_connect_errno($link))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//포스트로 idx값을 받아온다.
$IDX = $_POST['idx'];

$delete = mysqli_query($link,"DELETE FROM friend WHERE idx='$IDX'");

$row = mysqli_fetch_array($delete);

mysqli_close($con);
?>
