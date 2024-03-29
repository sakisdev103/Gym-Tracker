<?php
    include("./dbconnect.php");

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "email not valid";
        }else{
            $data = mysqli_query($conn, "SELECT * FROM users where email = '$email' ");
    
            if(mysqli_num_rows($data) > 0){
                $return = 0;
                echo json_encode($return);
            }else{
                $insert = mysqli_query($conn, "INSERT INTO users (email , password) VALUES('$email' , '$password')");
                $return = 1;
                echo json_encode($return);
            }

        }      
    }
?>