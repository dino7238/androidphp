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

//$email1=$_POST['login_id'];
//$email="dino231";


$sql="select * from post ORDER BY time DESC";

$select_query = "SELECT * FROM postlike";

$result=mysqli_query($link,$sql);


$data = array();

$a=0;
$i=0;
  //  if($row['like_id']=dino){
      if($result){
          while($row1=mysqli_fetch_array($result)){
            $result_set = mysqli_query($link, $select_query);
              $row=mysqli_fetch_array($result_set);
                $a=1;
            array_push($data,
                array('idx'=>$row1[0],
                  'writeid'=>$row1[1],
                'content'=>$row1[2],
                'time'=>$row1[3],
                'commentcount'=>$row1[5],
                'dasf'=>$row[$i];
            ));
            $i = $i+1;
        //  }
        }

  if($a==1){
    header('Content-Type: application/json; charset=utf8');
    $json = json_encode(array("webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
    echo $json;
  }
  else {
    echo "게시물이 없습니다.";
  }
}
else{
    echo "SQL문 처리중 에러 발생 : ";
    echo mysqli_error($link);
}

mysqli_close($link);
include_once('/checklike.php');
?>
