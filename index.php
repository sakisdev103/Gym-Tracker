<?php 
    session_start();
    include('./actions/dbconnect.php');
    if(!isset($_SESSION['user_id'])) {
        header('Location: ./login.php');
    } else {
        $user_id = $_SESSION['user_id'];
        $qry = mysqli_query($conn, "SELECT email from users where id = '$user_id'");
        $row  = $qry->fetch_assoc();
        $userEmail = $row['email'];
        
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
    <title>Gym Tracker</title>
</head>
<body>
    <section class="modal" id="modalNew">
        <div class="modal-container container">
            <div class="header-flex">
                <h3>New Exercise</h3>
                <button class="close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="container">
                <form action="./actions/add_exercise.php" method="POST" id="add-exercise-form">
                    <h3>Name</h3>
                    <input type="text" name="exercise_name" required="">
                    <h3>Category</h3>
                    <select name="exercise_category" class="add-exercise-category-option">
                        <?php
                            include("./actions/dbconnect.php");
                            $qry = mysqli_query($conn, "SELECT * FROM categories");
                            while($row = $qry -> fetch_assoc()):
                                ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php endwhile;?>
                    </select>
                    <button class="add-exercise" type="submit">ADD</button>
                </form>
            </div>
        </div>
    </section>
    <section class="modal" id="workoutContainer">
        <div class="modal-container container">
            <div class="header-flex">
                <h2>Workout</h2>                           
                <button class=" add-workout-btn" id="newExercise">New Exercise</button>
                <button class="close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="menu">
                <div class="select-workout container">
                    <?php
                        include("./actions/dbconnect.php");
                        $qry = mysqli_query($conn, "SELECT * FROM categories");
                        while($row = $qry -> fetch_assoc()):
                    ?>
                    <form action="./actions/selected_category.php" method="POST" class="display-selected-category">
                        <input type="hidden" name="selected_category" value="<?php echo $row['id']?>">
                        <button type="submit" id="btn"><?php echo $row['name']?></button>
                    </form>           
                    <?php endwhile;?>   
                </div>
                <div class="container">
                    <div class="display-selected-exercises-container">
    
                    </div>
                    <div class="container" id="input">
                        <form action="./actions/workout.php" method="POST" class="input-workout">
                            
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <header class="header container">
        <h3>Gym Tracker</h3>
        <a href="javascript:void(0)" id="logOut"><img width="25" height="25" src="https://img.icons8.com/ios/50/exit--v1.png" alt="exit--v1"/> <?php echo $userEmail;?> </a>  
        <div class="right">
            <ul>
                <li><button id="newWorkout" class=""><i class="fa-solid fa-plus"></i></button></li>
            </ul>
        </div>
    </header>
    <section class="alerts container">

    </section>
    <main class="main container">     
    <div class="date">
        <form action="" id="date">
            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
            <input type="date" name="date" value="<?php echo date(date("Y-m-d"))?>">
            <button type="submit" id="onLoadClick">Submit</button>
        </form>
    </div>     
    <div id="workout">

    </div>
    </main>
    <script src="./js/app.js"></script>
</body>
</html>