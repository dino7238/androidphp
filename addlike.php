<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$idx = $_POST['postidx'];
$id = $_POST['like_id'];


$liketime = date('Y-m-d H:i:s', time());
//sql문으로 포스트 테이블을 불러오기
mysqli_query($link,"UPDATE post SET good = good+1 where idx = '$idx'");
//sql문으로 포스트라이크 테이블에 데이터 추가하\
mysqli_query($link,"INSERT INTO postlike (postnumber, like_id, like_time)
VALUES ('$idx', '$id', '$liketime')");

echo "좋아요추가";

//코멘트 개수에 대해서 게시글에 정보를 실시간으로 업데이트 해주기
$sql1 = "SELECT * from postlike where postnumber='$idx'";

mysqli_query($link,$sql1);

$result1 = mysqli_query($link,$sql1);

$total_record = mysqli_num_rows($result1);

$change = mysqli_query($link,"UPDATE post SET goodcount = '$total_record' WHERE idx='$idx'");
$row = mysqli_fetch_array($change);
$data = $row[0];
mysqli_close($link);
?>
