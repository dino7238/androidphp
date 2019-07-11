<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");

$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

	//$email=$_POST['name'];
$id = dino;
$number = 39;

$idx = $_POST['postidx'];
$id = $_POST['like_id'];

//포스트라이크 데이터를 전부 불러오기
  $sql = "SELECT * FROM post";
  $member = mysqli_query($link,$sql);
  $a=0;
  while ($row = mysqli_fetch_array($member)) {
    if($row['writeid'] == $id){//아이디값일치여부 확인
      if($row['idx'] == $idx){//번호 일치 여부 확인
        $a=1;//두개의 조건식이 일치할경우 변수 a=1로 선언
      }
    }
  }

  if($a==1){
    $delete = mysqli_query($link,"DELETE FROM post WHERE idx='$idx'");
    $row = mysqli_fetch_array($delete);

    $delete1 = mysqli_query($link,"DELETE FROM comment WHERE postidx='$idx'");
    $row = mysqli_fetch_array($delete1);
    echo "삭제 완료";
  }
  else{
    echo "삭제 실패";
  }

?>
