<?php
    include('dbcon.php');
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    $link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
    mysqli_set_charset($link,"utf8");

   //안드로이드와 연결하기 위한코드
   //strpos($원본문자열, $찾을문자열) : $원본문자열 에서 $찾을문자열을 찾는 함수, 찾을문자열이 없는경우 false 를 리턴
   //찾을문자열이 원본문자열에서 몇번째 자리에 있는지를 찾아내 그 자리의 넘버를 리턴한다.
    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {
        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.
        $myemail=$_POST['myemail'];
        $friendemail=$_POST['friendemail'];
        $friendname=$_POST['friendname'];

        $sql = "SELECT * FROM friend";
        $member = mysqli_query($link,$sql);
        $a=0;
        while ($row = mysqli_fetch_array($member)) {
          if($row['myemail'] == $myemail){
            if($row['friendemail'] == $friendemail){
              $a=1;
            }
          }
        }
        if($a==1){
        echo "이미 추가된 아이디입니다.";
        }
        else{
            try{
                // SQL문을 실행하여 데이터를 MySQL 서버의 person 테이블에 저장합니다.
                $stmt = $con->prepare('INSERT INTO friend(myemail, friendemail, friendname) VALUES(:myemail, :friendemail, :friendname)');
                $stmt->bindParam(':myemail', $myemail);
                $stmt->bindParam(':friendemail', $friendemail);
                $stmt->bindParam(':friendname', $friendname);

                if($stmt->execute())
                {
                    $successMSG = "추가";
                }
                else
                {
                    $errMSG = "사용자 추가 에러";
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage());
            }
            //echo "가능";
        }
      }
?>

<?php
    if (isset($errMSG)) echo $errMSG;
    if (isset($successMSG)) echo $successMSG;

	$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

    if( !$android )
    {
?>

<?php
    }
?>
