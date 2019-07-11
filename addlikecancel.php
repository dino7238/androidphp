<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$idx = $_POST['postidx'];
$id = $_POST['like_id'];
//포스트라이크 데이터를 전부 불러오기
  $sql = "SELECT * FROM postlike";
  $member = mysqli_query($link,$sql);
  $a=0;
  while ($row = mysqli_fetch_array($member)) {
    if($row['like_id'] == $id){//아이디값일치여부 확인
      if($row['postnumber'] == $idx){//번호 일치 여부 확인
        $a=1;//두개의 조건식이 일치할경우 변수 a=1로 선언
      }
    }
  }

  if($a==1){
    $delete = mysqli_query($link,"DELETE FROM postlike WHERE postnumber='$idx' AND like_id ='$id'");
    $row = mysqli_fetch_array($delete);

    //$delete1 = mysqli_query($link,"DELETE FROM comment WHERE postidx='$idx'");
    //$row = mysqli_fetch_array($delete1);
    echo "좋아요취소";
  }
  else{
    echo "삭제 실패";
  }

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
