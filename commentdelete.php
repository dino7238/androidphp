<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");

if (mysqli_connect_errno($link))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//포스트로 idx값을 받아온다.
$commentidx=$_POST['commentidx'];
$post_idx=$_POST['post_idx'];
$delete = mysqli_query($link,"DELETE FROM comment WHERE commentidx='$commentidx'");

$row = mysqli_fetch_array($delete);

//코멘트 개수에 대해서 게시글에 정보를 실시간으로 업데이트 해주기
$sql1 = "SELECT * from comment where postidx='$post_idx'";

mysqli_query($link,$sql1);

$result1 = mysqli_query($link,$sql1);

$total_record = mysqli_num_rows($result1);

$change = mysqli_query($link,"UPDATE post SET commentcount = '$total_record' WHERE idx='$post_idx'");
$row = mysqli_fetch_array($change);
$data = $row[0];
mysqli_close($link);
?>
