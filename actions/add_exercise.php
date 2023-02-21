<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);

    $add = mysqli_query($conn, "INSERT INTO exercises (name, category_id) VALUES ('$exercise_name', '$exercise_category')");
    if($add){
        $return = 1;
        echo json_encode($return);
    }
?>