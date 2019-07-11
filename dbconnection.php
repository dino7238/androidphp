<?php
$host_name = "mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com";
$user_name = "user"; # MySQL 계정 아이디
$user_pass = "qudvlf12"; # MySQL 계정 패스워드
$db_name = "imagedb";  # DATABASE 이름

$con = mysqli_connect($host_name,$user_name,$user_pass,$db_name);

if($con)
{
  echo "Connection Success";
}
else {
  echo "Connection Fail";
}
?>
