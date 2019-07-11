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
$change = mysqli_query($link,"UPDATE post SET content = '$contents' WHERE idx='$idx'");
$row = mysqli_fetch_array($change);
$data = $row[0];

if($data){
echo $data;
}
mysqli_close($con);

$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$sql1 = "SELECT * FROM post";
$member = mysqli_query($link,$sql1);
$a=0;
while ($row = mysqli_fetch_array($member)) {
  if($row['idx'] == $idx){
      $data=$row['idx'];
  }
}

echo $data;
?>
