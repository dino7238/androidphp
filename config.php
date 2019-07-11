<?php
$DB['HOST'] = 'mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com';
$DB['id'] = 'user';
$DB['pw'] = 'qudvlf12';
$DB['db'] = 'mydb';


echo "MySql 연결 테스트<br>";

$db = mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "mydb");


?>
