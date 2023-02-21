<?php session_start();?>
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
            <button class="close"><i class="fa-solid fa-xmark"></i></button>
            <h3>New Exercise</h3>
            <div class="container">
                <form action="./actions/add_exercise.php" method="POST" id="add-exercise-form">
                    <p>Name:</p>
                    <input type="text" name="exercise_name">
                    <p>Category:</p>
                    <select name="exercise_category">
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
            <button class="modal-center add-workout-btn" id="newExercise">New Exercise</button>
            <button class="close"><i class="fa-solid fa-xmark"></i></button>
            <h3>Workout</h3>                           
            <div class="select-workout container">
            <p>Select category</p>
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
    </section>
    <header class="header container">
        <p>Gym Tracker</p>
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