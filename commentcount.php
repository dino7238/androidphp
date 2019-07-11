<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$post_idx=$_POST['post_idx'];

//sql문으로 포스트 테이블을 불러오기
//mysqli_query($link,"UPDATE post SET good = good+1 where idx = '$idx'");
//sql문으로 포스트라이크 테이블에 데이터 추가하\
$sql = "SELECT * from comment where postidx='$post_idx'";
mysqli_query($link,$sql);

$result = mysqli_query($link,$sql);

$total_record = mysqli_num_rows($result);

echo "$total_record";

mysqli_close($link);
?>
