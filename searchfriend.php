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

$email="dino231";
$email1=$_POST['searchid'];

$sql="select * from member";

$result=mysqli_query($link,$sql);
$data = array();
$a=0;
if($result){
    while($row=mysqli_fetch_array($result)){
      if($row['email'] == $email1){
        $a=1;
        array_push($data,
            array('name'=>$row[0],
            'email'=>$row[1],
            'password'=>$row[2]
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
