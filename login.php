<?php
    session_start();
    include('./actions/dbconnect.php');

    if(isset($_SESSION['user_id'])){
        header('Location: ./index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <title>Gym Tracker / Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login login-page-form">
            <h2>Login</h2>
            <form action="./actions/login_form.php" method="POST" class="form" id="loginForm">
                <p>Email</p>
                <input id="login-form-email" type="email" name="email" required="">
                <p>Password</p>
                <input id="login-form-password" type="password" name="password" required="">
                <br>
                <button type="submit" name="submit" class="submit-form" id="login-form">Login Now</button>
            </form>
            <p class="form-message"></p>
            <p>Don't have an account? <a href="javascript:void(0)" id="sign-btn">Sign Up</a></p>
        </div>
        <div class="sign-up login-page-form">
            <h2>Create Account</h2>
            <form action="./actions/create_Account.php" method="POST" class="form" id="signUp">
                <p>Email</p>
                <input id="form-email" type="email" name="email" required="">
                <p>Password</p>
                <input id="form-password" type="password" name="password"  required="">
                <br>
                <button type="submit" name="submit" class="submit-form">Sign Up</button>
            </form>
            <p class="form-message"></p>
            <p>You have an account? <a href="javascript:void(0)" id="login-btn">Login Now!</a></p>
        </div>

    </div>
    <script src="./js/app.js"></script>
</body>
</html>