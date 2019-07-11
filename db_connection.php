<?php

define("DB_HOST","mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com");
    define("DB_USER","user");
    define("DB_PASSWORD","qudvlf12");
    define("DB_DATABASE","photo_gallery");

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    /*$connection = mysqli_connect("mydatabase.c23cvemsdmhw.ap-northeast-2.rds.amazonaws.com", "user", "qudvlf12", "photo_gallery");*/

    if(mysqli_connect_errno()){
        die("Database connnection failed " . "(" .
            mysqli_connect_error() . " - " . mysqli_connect_errno() . ")"
                );
    }
?>
