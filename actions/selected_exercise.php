<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);
    $qry = mysqli_query($conn, "SELECT * FROM exercises where id = '$selected_exercise'");
    while($row = $qry->fetch_assoc()):
?>
    <input type='hidden' name='exercise' value='<?php echo $row['name']?>'>
    <input type='hidden' name='category' value='<?php echo $selected_exercise?>'>
    <input type='text' name='weight' placeholder='Weight'>
    <input type='text' name='reps' placeholder='Reps'>
    <button type='submit' >Submit</button>

<?php endwhile;?>