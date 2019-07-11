<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");

$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

	$email=$_POST['name'];
  $password=$_POST['password'];

$query = "SELECT * from member where email='$email' and password='$password'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);



if($email==$row['email'] && $password==$row['password']){ // id와 pw가 맞다면 login

  // $_SESSION['id']=$row['id'];
  // $_SESSION['name']=$row['name'];
   echo "로그인 성공";

}else{ // id 또는 pw가 다르다면 login 폼으로

   echo "잘못된 아이디 또는 비빌번호 입니다"; // 잘못된 아이디 또는 비빌번호 입니다
  // echo "<script>location.href='login.php';</script>";

}

  /*$sql = "SELECT * FROM member";
  $member = mysqli_query($link,$sql);
  while ($row = mysqli_fetch_array($member)){
    if($row['email'] == $email){//이메일이 있을때 해당 비밀번호를 확인해보자
      if($row['password'] == $password){
        //echo "로그인 성공";
        echo $success=1;
      }
      else {
        //echo "비밀번호를 확인하세요";
      }
    }
    else {

    }echo $fail=0; //echo "아이디 또는 비밀번호를 확인하세요";
  }*/

?>
