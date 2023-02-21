<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);
    $date = date("y-m-d");

    $workout = mysqli_query($conn, "INSERT INTO workouts (category_id, name, weight, reps, date) VALUES ('$category', '$exercise', '$weight', '$reps', '$date')");
    if($workout){
        $return = 1;
        echo json_encode($return); 
    }
?>