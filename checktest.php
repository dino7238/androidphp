<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");

$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

	$email=$_POST['name'];


  $sql = "SELECT * FROM member";
  $member = mysqli_query($link,$sql);
  $a=0;
  while ($row = mysqli_fetch_array($member)) {
    if($row['email'] == $email){
      $a=1;
    }
  }

  if($a==1){
    echo "중복";
  }
  else{
    echo "가능";
  }

?>
