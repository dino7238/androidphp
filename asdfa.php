<?php
include('config.php');



$select_query = "SELECT * FROM member";

$result_set = mysqli_query($db, $select_query);



$row = mysqli_fetch_array($result_set);



echo '$row : ';

print_r($row);

echo '<br>';



mysqli_close($conn);
?>
