<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);
    $qry = mysqli_query($conn, "SELECT * FROM exercises where category_id = '$selected_category'");
    while($row = $qry->fetch_assoc()):

?>
<form action="./actions/selected_exercise.php" method="POST"  class="display-selected-exercises">
    <input type='hidden' name='selected_exercise' id="selected_exercise_id" value='<?php echo $row['id'] ?>'>
    <button type='submit' id="selected_exercise"><?php echo $row['name']?></button>             
</form>


<?php endwhile;?>


<script>
     $(".display-selected-exercises").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/selected_exercise.php',
            method: 'POST',
            data: $(this).serialize(),
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                $(".display-selected-exercises").hide("");
                $("#input").show("");
                $(".input-workout").html(data);
            }
        });
        this.reset();
    })
</script>