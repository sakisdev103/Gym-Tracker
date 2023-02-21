$(document).ready(function(){
    
    //Dom Manipulation

    $("#newExercise").click(function(){
        $("#workoutContainer").hide("");
        $("#modalNew").show("");
    });

    $("#newWorkout").click(function(){
        $("#workoutContainer").show("");
        $("#date").hide("");
        $(".right").hide("");
    });

    $(".close").click(function(){
        $(".modal").hide("");
        $("#date").show("");
        $(".right").show("");
    });

    //Add Workout

    $(".display-selected-category").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/selected_category.php',
            method: 'POST',
            data: $(this).serialize(),
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                $(".select-workout").hide("");
                $(".display-selected-exercises-container").html(data);
            }
        });

    });


    $(".input-workout").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/workout.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            error:err=>{
                console.log(err)
            }, 
            success: function(data){
                resp = $.parseJSON(data);
                if(resp == 1){
                    $(".modal").hide("");
                    setTimeout(function(){$(".alerts").show().text("Workout added successfully").addClass("form-success")}, 1000);
                    setTimeout(function(){$(".alerts").hide("")}, 2000);
                    setTimeout(function(){location.reload()}, 3000);
                }
            }
        });
        this.reset();
    });

    //New exercise

    $("#add-exercise-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: './actions/add_exercise.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            error:err=>{
                console.log(err)
            },    
            success: function(data){
                resp = $.parseJSON(data);
                if(resp == 1){
                    $(".modal").hide("");
                    setTimeout(function(){$(".alerts").show().text("Exercise added successfully").addClass("form-success")}, 1000);
                    setTimeout(function(){$(".alerts").hide("")}, 2000);
                    setTimeout(function(){location.reload()}, 3000);
                }else{
                    $(".modal").hide("");
                    setTimeout(function(){$(".alerts").show().text("Failed to add exercise").addClass("form-error")}, 1000);
                    setTimeout(function(){$(".alerts").hide("")}, 2000);
                }
            }
        });
        this.reset();
    })

    //Date

    setInterval(function(){$("#onLoadClick").click()}, 0000);

    $("#date").submit(function(e){
        e.preventDefault();
        $.ajax({
           url: './actions/date.php',
           method: 'POST',
           data: $(this).serialize(),
           error:err=>{
                console.log(err)
           },  
           success: function(data){
                $("#workout").html(data);
           }
        });
    });

});    