<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");

$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

	//$email=$_POST['name'];
$id = 'dino';
$number = '39';

//포스트라이크 데이터를 전부 불러오기
  $sql = "SELECT * FROM postlike";
  $member = mysqli_query($link,$sql);
  $a=0;
  while ($row = mysqli_fetch_array($member)) {
    //  if($row['postnumber'] == $number){//번호 일치 여부 확인
        $a=1;//두개의 조건식이 일치할경우 변수 a=1로 선언
        echo $row['like_id'];
    //  }
  }

  if($a==1){
    //echo $row[1];
  }
  else{
    echo "데이터없음";
  }

?>
