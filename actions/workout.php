<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);
    $date = date("y-m-d");

    $workout = mysqli_query($conn, "INSERT INTO workouts (category_id, name, weight, reps, date, user_id) VALUES ('$category', '$exercise', '$weight', '$reps', '$date', '$user_id')");
    if($workout){
        $return = 1;
        echo json_encode($return); 
    }
?>