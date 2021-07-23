<?php
    session_start(); 
    
    error_reporting(1);
    ini_set("display_errors", 1);


    $connect = mysqli_connect("localhost","korea","fighting","korea"); 

    if(mysqli_connect_error()){
        echo "mysql 접속중 오류가 발생했습니다. ";
        echo mysqli_connect_error(); 
    }

    function getUserName($connect, $user_id) {
        $user_id = mysqli_real_escape_string($connect, $user_id);

        $sql = "SELECT * FROM members WHERE id = {$user_id}";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);

        return $row ? $row['name'] : NULL;
    }

    ?>