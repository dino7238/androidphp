<?php
include('dbcon.php');
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {
        // 안드로이드 코드의 postParameters 변수에 적어준 이름을 가지고 값을 전달 받습니다.

        $name=$_POST['name'];

        echo $name;


        if(empty($name)){
            $errMSG = "이름을 입력하세요.";
        }

        if(!isset($errMSG)) // 이름과 나라 모두 입력이 되었다면

                // SQL문을 실행하여 데이터를 MySQL 서버의 person 테이블에 저장합니다.
                //$stmt = $con->prepare('INSERT INTO person(name, country) VALUES(:name, :country)');
                $stmt->bindParam(':name', $name);


                if($stmt->execute())
                {
                    $successMSG = "중복.";
                }
                else
                {
                    $errMSG = "가능";
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
