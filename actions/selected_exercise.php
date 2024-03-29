<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);
    $user_id = $_SESSION['user_id'];
    $qry = mysqli_query($conn, "SELECT * FROM exercises where id = '$selected_exercise'");
    while($row = $qry->fetch_assoc()):
        $exercise_name = $row['name'];
?>
    <h3><?php echo $exercise_name?></h3>
    <input type='hidden' name='exercise' value='<?php echo $row['name']?>'>
    <input type='hidden' name='category' value='<?php echo $selected_exercise?>'>
    <input type="hidden" name="user_id" value= "<?php echo $user_id?>">
    <p>WEIGHT</p>
    <input type='text' name='weight' required="">
    <P>REPS</P>
    <input type='text' name='reps' required="">
    <button type='submit' class='save'>Save</button>

<?php endwhile;?>