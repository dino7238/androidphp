<?php
//$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
// Create connection
$conn = new mysqli("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$timeString = date('Y-m-d H:i:s', time());
$writeid=$_POST['writeid'];
$contents=$_POST['contents'];
$sql = "INSERT INTO post (writeid, content, time)
VALUES ('$writeid', '$contents', '$timeString')";

if ($conn->query($sql) === TRUE) {

} else {
  
}
$conn->close();
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$sql1 = "SELECT * FROM post";
$member = mysqli_query($link,$sql1);
$a=0;
while ($row = mysqli_fetch_array($member)) {
  if($row['writeid'] == $writeid){
    if($row['time'] == $timeString){
      $data=$row['idx'];
    }
  }
}

echo $data;
?>
