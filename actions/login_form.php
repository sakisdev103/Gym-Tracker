<?php
    session_start();
    include ("./dbconnect.php");
    extract($_POST);
    $password = md5($_POST['password']);
    $qry = mysqli_query($conn,"SELECT * FROM users where email = '$email' ");
    if($qry->num_rows > 0){
        $qry = mysqli_query($conn , "SELECT * FROM users where email = '$email' and password = '$password'");
        $row = $qry->fetch_assoc();
        if($row){
            $user_id = $row['id'];
            $_SESSION["user_id"] = $user_id;
            $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
            $return = 1;
            echo json_encode(array("response" => $return,  "user_id" => $user_id));
        } else{
            $return = 2;
            echo json_encode(array("response" => $return, "user_id" => null));
        }
    }else{
        $return = 0;
        echo json_encode(array("response" => $return, "user_id" => null));
    }

?>