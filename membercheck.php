<?php
$link=mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");
mysqli_set_charset($link,"utf8");



$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

	$uid = $_GET["email"];


  $sql = "SELECT * FROM member";
  $member = mysqli_query($link,$sql);
  $a=0;
  while ($row = mysqli_fetch_array($member)) {
    if($row['email'] == $uid){
      $a=1;
    }
  }

  if($a==1){
    echo "중복";
  }
  else{
    echo "가능";
  }

  echo $uid;



	/*if($temp['email']!=$uid)//member변수에 저장된 값이 없다면 사용가능한 아이디입니다
	{
?><!--사용가능한 아이디 입니다라는 팝업이 출력-->
	<div style='font-family:"malgun gothic"';><?php echo $uid; ?>는 사용가능한 아이디입니다.</div>
<?php
}else{//member변수에 저장된 값이 있다면 사용가능한 아이디입니다
?><!--는 사용할 수 없는 아이디입니다라는 팝업이 출력-->
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>는 사용할 수 없는 아이디입니다.<div>
<?php
	}
?>
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>*/
