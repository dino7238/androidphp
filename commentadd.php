<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$timeString = date('Y-m-d H:i:s', time());
$post_idx=$_POST['post_idx'];
$comment_id=$_POST['comment_id'];
$comment=$_POST['comment'];

//sql문으로 포스트 테이블을 불러오기
//mysqli_query($link,"UPDATE post SET good = good+1 where idx = '$idx'");
//sql문으로 포스트라이크 테이블에 데이터 추가하\
$sql = "INSERT INTO comment(postidx, comment, commentid , commenttime)VALUES ('$post_idx','$comment','$comment_id','$liketime')";
echo "ads";
mysqli_query($link,$sql);
//$post_idx=$_POST['post_idx'];

$sql1 = "SELECT * from comment where postidx='$post_idx'";

mysqli_query($link,$sql1);

$result1 = mysqli_query($link,$sql1);

$total_record = mysqli_num_rows($result1);

$change = mysqli_query($link,"UPDATE post SET commentcount = '$total_record' WHERE idx='$post_idx'");
$row = mysqli_fetch_array($change);
$data = $row[0];
mysqli_close($link);
?>
