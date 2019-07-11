<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
if (!$link)
{
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();
}
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
mysqli_set_charset($link,"utf8");

$id=$_POST['login_id'];
//$email="dino231";


$sql="SELECT * from postlike WHERE like_id='$id'";

$result=mysqli_query($link,$sql);

$sql1="select * from post ORDER BY time DESC";

$result1=mysqli_query($link,$sql1);

$data = array();
$data1 = array();
$a=0;

if($result){
    while($row=mysqli_fetch_array($result)){
        //$a=1;
         array_push($data, array('postidx'=>$row[0],'likeid'=>$row[1]));
  }
}

    //echo json_encode(array("webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    if($result1){
        while($row1=mysqli_fetch_array($result1)){
          array_push($data1,
              array('idx'=>$row1[0],
                'writeid'=>$row1[1],
              'content'=>$row1[2],
              'time'=>$row1[3],
              'goodcount'=>$row1[6],
              'commentcount'=>$row1[5]
          ));
      }
        header('Content-Type: application/json; charset=utf8');
    echo json_encode(array("webnautes"=>$data,"asdf"=>$data1), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
  }
  else {
    echo "게시물이 없습니다.";
  }




mysqli_close($link);

?>
