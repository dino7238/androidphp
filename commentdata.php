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

$idx=$_POST['postidx'];

$email="dino231";
//sql문으로 comment를 불러온다.
$sql="select * from comment";

$result=mysqli_query($link,$sql);
$data = array();
$a=0;
if($result){
    while($row=mysqli_fetch_array($result)){
      //postidx와 $idx가 같을때
      if($row['postidx'] == $idx){
        $a=1;
        array_push($data,
            array('comment'=>$row[2],
            'commentid'=>$row[3],
            'postidx'=>$row[1],
            'commentidx'=>$row[0]
        ));
    }
  }
  if($a==1){
    header('Content-Type: application/json; charset=utf8');
    $json = json_encode(array("webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    echo $json;
  }
  else {
    echo "없는 아이디입니다.";
  }
}
else{
    echo "SQL문 처리중 에러 발생 : ";
    echo mysqli_error($link);
}

mysqli_close($link);

?>
