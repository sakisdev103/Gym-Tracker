<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);

    $qry = mysqli_query($conn, "SELECT * FROM workouts where date = '$date' and user_id = '$user_id'");
    while($row = $qry->fetch_assoc()):
?>   

<div class="workout">
    <div class="workout-header">
        <p><?php echo $row['name']?></p>
    </div>
    <div class="workout-body">
        <div>
            <?php echo $row['weight']?> kgs
        </div>
        <div>
            <?php echo $row['reps']?> reps
        </div>
    </div>
    
</div>
<?php endwhile;?>