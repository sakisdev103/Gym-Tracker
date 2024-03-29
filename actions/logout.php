<?php
    session_start();
    foreach ($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
    }
    if(isset($_SESSION['user_id'])){
        $return = 0;
        echo json_encode($return);
    }else{
        $return = 1;
        echo json_encode($return);
    }

?>